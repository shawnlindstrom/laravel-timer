<?php

declare(strict_types=1);

namespace shawnlindstrom\LaravelTimer\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use shawnlindstrom\LaravelTimer\LaravelTimerServiceProvider;

abstract class TestCase extends Orchestra
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
            LaravelTimerServiceProvider::class,
        ];
    }

    /**
     * Get package aliases.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array<string, class-string>
     */
    protected function getPackageAliases($app): array
    {
        return [
            'Timer' => \shawnlindstrom\LaravelTimer\TimerFacade::class,
        ];
    }
}
