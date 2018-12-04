# laravel-timer


![Packagist](https://img.shields.io/packagist/v/shawnlindstrom/laravel-timer.svg)
![Packagist](https://img.shields.io/packagist/l/shawnlindstrom/laravel-timer.svg)


This simple package provides high-resolution, monotonic time when available (PHP >=7.3) for all
your timing needs.

## Installation

Via Composer

``` bash
$ composer require shawnlindstrom/laravel-timer
```

## Usage

New up an instance:

``` php
$timer = new \shawnlindstrom\Timer;
$timer->start(); 
// do something useful ...
$timer->stop();

echo $timer->elapsed(); // default precision is seconds
// 2
```
Elapsed time can be returned in seconds, microseconds, milliseconds, or nanoseconds:

``` php
$timer->elapsed(TimeUnit::NANOSECONDS);
```
Via Facade:
``` php
Timer::start();
// do something useful ...
Timer::stop();

echo SW::elapsed(TimeUnit::MICROSECONDS);
// 
```

## Change log

Please see the [changelog](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [contributing.md](CONTRIBUTING.md) for details and a todolist.

## Security

If you discover any security related issues, please email shawn@tenerant.com instead of using the issue tracker.

## Credits

- [Shawn Lindstrom][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/shawnlindstrom/laravel-stopwatch.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/shawnlindstrom/laravel-stopwatch.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/shawnlindstrom/laravel-stopwatch/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/shawnlindstrom/laravel-stopwatch
[link-downloads]: https://packagist.org/packages/shawnlindstrom/laravel-stopwatch
[link-travis]: https://travis-ci.org/shawnlindstrom/laravel-stopwatch
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/shawnlindstrom
[link-contributors]: ../../contributors]
