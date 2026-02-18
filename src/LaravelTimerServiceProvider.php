<?php

declare(strict_types=1);

namespace shawnlindstrom\LaravelTimer;

use Illuminate\Support\ServiceProvider;

class LaravelTimerServiceProvider extends ServiceProvider
{
    /**
     * Register any package services.
     */
    public function register(): void
    {
        $this->app->singleton(Timer::class, fn () => new Timer);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array<int, string>
     */
    public function provides(): array
    {
        return [Timer::class];
    }
}
