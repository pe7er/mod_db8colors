# mod_db8colors - db8 Colors

Joomla 5 and Joomla 6 administrator module that documents the colors used in your site, as a table of swatches on the back-end dashboard.

## What it does
- Shows a table of color names (or LESS/CSS variable names) with their value and a swatch.
- Uses the administrator template's own table classes, so it follows dark mode.

## Requirements
- Joomla 5 or 6
- PHP 8.1 or later

## Installation
Install like any other Joomla module. Updates come from https://extensions.db8.nl.

## Configuration
- Content > Administrator Modules > New > select `Module - db8 Colors`
- Give the module a title, e.g. `db8 Colors`, and a position, e.g. `cpanel`
- Under `Color Name` add your **color names**, or **LESS variable names**
- Under `Color Value` add your **color value** in hex format (like `#ff0000` for Red, `#00ff00` for Green, or `#0000ff` for Blue)
- Save the module

![mod_db8colors_configure](https://github.com/pe7er/mod_db8colors/assets/1217850/5d988a70-88fa-4645-8b0f-370417da2a1d)

The dashboard then shows the colors that you added:

![mod_db8colors_result](https://github.com/pe7er/mod_db8colors/assets/1217850/4847a21c-34cf-4c95-b5b2-74fe753568ed)

## Available Languages
- Dutch (nl-NL)
- English (en-GB)
- French (fr-FR)
- German (de-DE)
- Italian (it-IT)
- Portuguese (pt-PT)
- Spanish (es-ES)
- Turkish (tr-TR) (thanks joomlaphp)

## Build
- `scripts/build.sh` builds `dist/mod_db8colors-<version>.zip` with a `.sha512` sidecar
- `scripts/install.sh /path/to/joomla` builds and installs it into a Joomla site
- `scripts/sync.sh /path/to/joomla` copies changed files into an installed copy (`--dry-run` shows what would change)

## Changelog
See [CHANGELOG.md](CHANGELOG.md) for release notes.
