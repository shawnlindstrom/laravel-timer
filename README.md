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

echo Timer::elapsed(TimeUnit::MICROSECONDS);

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
