#!/usr/bin/env bash
#
# Build the installable zip into dist/, the same way the release workflow does,
# with a .sha512 sidecar.
#
# Usage: ./scripts/build.sh
#
set -euo pipefail

REPO="$(cd "$(dirname "$0")/.." && pwd)"
cd "$REPO"

# shellcheck disable=SC1091
source .env
# SOURCE_DIR comes from .env.
ZIP="$REPO/dist/$EXTENSION-$VERSION.zip"

mkdir -p dist
rm -f "$ZIP"
( cd "$SOURCE_DIR" && zip -qr -X "$ZIP" . )
( cd dist && sha512sum "$(basename "$ZIP")" > "$(basename "$ZIP").sha512" )

echo "$ZIP"
