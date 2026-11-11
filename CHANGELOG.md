# Changelog

All notable changes to this project are documented in this file.

The format follows [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/).

## [1.1.0] - unreleased

### Changed
- Licensed under GPL v2 or later (LICENSE.txt), with the same manifest layout and file headers as the other db8 extensions. The manifest has a `<changelogurl>`, so *System → Manage → Extensions* shows a Changelog button.
- Updates now come from extensions.db8.nl.
- Requires Joomla 5 or 6.
- A service provider and dispatcher replace the legacy `mod_db8colors.php` entry file.
- The table uses the administrator template's own table classes, so it follows dark mode.

### Fixed
- The module's styles no longer change every other table on the same page.
- Screen readers: the table has a hidden caption with the module title, and the swatch column (headed "Swatch" instead of "SVG") is skipped, as the hex value next to it already gives the colour.

## [1.0.5] - 2024-03-18

### Added
- Turkish (tr-TR), thanks @joomlaphp.

## [1.0.4] - 2024-03-13

### Added
- German, French, Spanish, Italian, Portuguese and Dutch.
