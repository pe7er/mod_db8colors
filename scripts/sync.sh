#!/usr/bin/env bash
#
# Copy this extension into a live Joomla install, without running the installer.
#
#   ./scripts/sync.sh <joomla_root>              copy changed files
#   ./scripts/sync.sh <joomla_root> --dry-run    show what would change
#   ./scripts/sync.sh <joomla_root> --delete     also remove files no longer in the source
#
# One-way, repo -> site. The repo is the source of truth; nothing is ever
# copied back. Use scripts/install.sh when the manifest or the SQL changed.
#
set -euo pipefail

REPO="$(cd "$(dirname "$0")/.." && pwd)"
JOOMLA="$(cd "${1:?usage: sync.sh <joomla_root> [--dry-run] [--delete]}" && pwd)"
shift || true
[ -f "$JOOMLA/configuration.php" ] || { echo "Not a Joomla root: $JOOMLA" >&2; exit 1; }

FLAGS=(-a --itemize-changes)
for arg in "$@"; do
    case "$arg" in
        --dry-run) FLAGS+=(--dry-run) ;;
        --delete)  FLAGS+=(--delete) ;;
        *) echo "Unknown option: $arg" >&2; exit 1 ;;
    esac
done

# shellcheck disable=SC1091
source "$REPO/.env"
SOURCE="$REPO/$SOURCE_DIR"
NAME="$(basename "$SOURCE_DIR")"
HEAD="$(grep -m1 -o '<extension[^>]*>' "$SOURCE/$MANIFEST")"

# Where the installer puts this extension: languages live in its own folder.
case "$HEAD" in
    *'type="plugin"'*)
        GROUP="$(sed -n 's/.*group="\([^"]*\)".*/\1/p' <<< "$HEAD")"
        TARGET="$JOOMLA/plugins/$GROUP/$NAME" ;;
    *'type="module"'*'client="administrator"'*)
        TARGET="$JOOMLA/administrator/modules/$NAME" ;;
    *'type="module"'*)
        TARGET="$JOOMLA/modules/$NAME" ;;
    *) echo "Unsupported extension type in $MANIFEST" >&2; exit 1 ;;
esac

[ -d "$TARGET" ] || { echo "Not installed yet: $TARGET. Run scripts/install.sh first." >&2; exit 1; }

rsync "${FLAGS[@]}" "$SOURCE/" "$TARGET/"
