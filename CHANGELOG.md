# Change log

All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](https://semver.org/).

## x.y.z

### Added

### Changed

### Deprecated

### Removed

### Fixed

## 6.0.0

### Changed
- Use native type declarations for properties (#404, #405)

### Removed
- Drop `FrontendUserWithCountry` (#390)
- Drop the `fax` field (#388)
- Drop support for TYPO3 10LTS (#387, #410)
- Drop support for PHP 7.2/7.3 (#386)

## 5.4.0

### Added
- Add `.creationDate` and `.modificationDate` properties (#383)
- Add support for PHP 8.3 (#382)

### Changed
- Use short class names in the PHPDoc annotations (#336)
- Mention the 12LTS crowdfunding campaign (#333)

### Removed
- Drop the property mapping for the removed `lockToDomain` property (#325)

## 5.3.0

### Added
- Add a gender value "diverse" (#264)

### Deprecated
- Deprecate `FrontendUserWithCountry` and its repository (#265)

## 5.2.2

### Changed
- Require TYPO3 ^11.5.4 for TYPO3 11LTS (#259)
- Switch the coverage on CI from Xdebug to PCOV (#223)

### Fixed
- Enable caching for PHP-CS-Fixer (#248)

## 5.2.1

### Fixed
- Ignore the storage PID in `FrontendUserGroupRepository::findByUids` (#208)

## 5.2.0

### Added
- Add `FrontendUserGroupRepository::findByUids` (#207)

## 5.1.1

### Changed
- Require TYPO3 >= 10.4.11 (#173)

### Fixed
- Stop using the deprecated `TYPO3_MODE` constant (#175)

## 5.1.0

### Added
- Add support for PHP 8.2 (#158, #159)
- Add support for TYPO3 11LTS (#154, #155, #156)

### Removed
- Drop the Prophecy dependency (#151)

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
