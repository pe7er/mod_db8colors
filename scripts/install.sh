#!/usr/bin/env bash
#
# Build the module and install it into a Joomla site with Joomla's CLI.
#
# Usage: ./scripts/install.sh /path/to/joomla
#
set -euo pipefail

REPO="$(cd "$(dirname "$0")/.." && pwd)"
JOOMLA="$(cd "${1:?Usage: $0 /path/to/joomla}" && pwd)"
[ -f "$JOOMLA/configuration.php" ] || { echo "Not a Joomla root: $JOOMLA" >&2; exit 1; }

# Prefer the container's PHP when the site runs under docker compose.
COMPOSE_ROOT=""
probe="$(cd "$JOOMLA/.." && pwd)"
while [ "$probe" != "/" ]; do
    [ -f "$probe/docker-compose.yml" ] && { COMPOSE_ROOT="$probe"; break; }
    probe="$(dirname "$probe")"
done

if [ -n "$COMPOSE_ROOT" ]; then
    runphp() { ( cd "$COMPOSE_ROOT" && docker compose exec -T -w /usr/local/apache2/htdocs phpfpm php "$@" ); }
else
    runphp() { ( cd "$JOOMLA" && php "$@" ); }
fi

ZIP="$("$REPO/scripts/build.sh")"
NAME="$(basename "$ZIP")"

mkdir -p "$JOOMLA/tmp"
cp "$ZIP" "$JOOMLA/tmp/$NAME"
trap 'rm -f "$JOOMLA/tmp/$NAME"' EXIT

runphp cli/joomla.php extension:install --path="tmp/$NAME"
