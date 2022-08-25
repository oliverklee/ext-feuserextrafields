# Change log

All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](https://semver.org/).

## x.y.z

### Added

### Changed

### Deprecated

### Removed
- Drop the Prophecy dependency (#151)

### Fixed

# 5.0.0

### Removed
- Drop the `locktodomain` property (#146)

## 4.2.1

### Added
- Add tests that the models can be XCLASSed (#143)

### Fixed
- Reduce code duplication in the repositories (#144)
- Bump the minimal 10.4 Extbase requirement (#137)

## 4.2.0

### Added
- Add length validation to the model properties (#109)
- Add `Repository.persistAll` (#90)
- Add tests concerning handling a user's PID (#75)

### Fixed
- Improve the type annotations (#107)

## 4.1.0

### Added
- Add `FrontendUser(WithCountry)Repository::existsWithUsername` (#69)
- Add `FrontendUser(WithCountry)Repository::findOneByUsername` (#68)

### Fixed
- Fix the German label for `static_info_country` (#68)

## 4.0.0

### Changed
- Reuse `initializeObject` from the constructor (#54)
- Switch the code coverage collection to Coveralls (#53)

### Removed
- Drop support for TYPO3 V9 (#49)

### Fixed
- Make sure the necessary directories get created when running the tests (#56)

## 3.0.0

Completely rewritten for TYPO3 V9/V10.
