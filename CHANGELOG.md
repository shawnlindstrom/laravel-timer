# Changelog

All notable changes to `laravel-timer` will be documented in this file.

## [0.2.0] - 2026-02-18

### Added
- PHP 8.3+ support with modern language features
- Laravel 12.x compatibility
- PHPUnit 11 support
- PHPStan static analysis (level max)
- Laravel Pint code formatting
- Strict type declarations throughout codebase
- Complete PHPDoc annotations
- Comprehensive test coverage (90%+)
- Code coverage reporting
- Additional test cases for edge conditions
- Modern PHPUnit attributes (`#[Test]`)
- Proper exception handling with `LogicException`

### Changed
- **BREAKING**: Minimum PHP version is now 8.3 (was ~5.x/7.x)
- **BREAKING**: Minimum Laravel version is now 12.x (was ~5.0)
- **BREAKING**: `TimeUnit` is now a backed enum instead of a class with constants
- **BREAKING**: Removed PHP < 7.3 fallback to `microtime()` - now exclusively uses `hrtime()`
- Updated all dependencies to latest stable versions
- Modernized service provider with typed properties and return types
- Improved facade with proper PHPDoc annotations
- Enhanced test suite with better assertions and timing tolerances
- Updated README with comprehensive modern examples

### Removed
- **BREAKING**: Removed support for PHP versions below 8.3
- **BREAKING**: Removed `microtime()` fallback (hrtime is available in all supported PHP versions)
- Removed obsolete dev dependencies

### Security
- Upgraded PHPUnit from ~7.0 (with CVE) to 11.x
- All dependencies updated to secure versions

## [0.1.0] - Initial Release

### Added
- Initial release
- Basic timer functionality
- Support for multiple time units
- Laravel service provider
- Facade support
- Basic test coverage

[0.2.0]: https://github.com/shawnlindstrom/laravel-timer/compare/v0.1.0...v0.2.0
[0.1.0]: https://github.com/shawnlindstrom/laravel-timer/releases/tag/v0.1.0
