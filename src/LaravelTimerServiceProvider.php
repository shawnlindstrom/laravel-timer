<?php

namespace shawnlindstrom\LaravelTimer;

use Illuminate\Support\ServiceProvider;

class LaravelTimerServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        // Register the service the package provides.
        $this->app->singleton(Timer::class, function ($app) {
            return new Timer;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string
     */
    public function provides()
    {
        return Timer::class;
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        //
    }
}
