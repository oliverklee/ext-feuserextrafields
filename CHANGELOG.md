# Change log

All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](https://semver.org/).

## x.y.z

### Added

### Changed

### Deprecated

### Removed

### Fixed

## 3.2.0

### Added
- Add length validation to the model properties (#109)
- Add `Repository.persistAll` (#90)
- Add tests concerning handling a user's PID (#75)

### Fixed
- Improve the type annotations (#107)

## 3.1.0

### Added
- Add `FrontendUser(WithCountry)Repository::existsWithUsername` (#69)
- Add `FrontendUser(WithCountry)Repository::findOneByUsername` (#68)

### Changed
- Reuse `initializeObject` from the constructor (#54)

### Fixed
- Fix the German label for `static_info_country` (#68)

## 3.0.0

Completely rewritten for TYPO3 V9/V10.
