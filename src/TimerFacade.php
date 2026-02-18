<?php

declare(strict_types=1);

namespace shawnlindstrom\LaravelTimer;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void start()
 * @method static void stop()
 * @method static int elapsed(TimeUnit $unit = TimeUnit::SECOND)
 *
 * @see Timer
 */
class TimerFacade extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return Timer::class;
    }
}
