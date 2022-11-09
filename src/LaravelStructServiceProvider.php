<?php

declare(strict_types=1);

namespace Signifly\LaravelStruct;

use Illuminate\Support\ServiceProvider;

class LaravelStructServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register config
     *
     * @return void
     */
    protected function registerConfig(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/laravel-struct.php' => config_path('laravel-struct.php'),
            ], 'laravel-struct');
        }

        $this->mergeConfigFrom(__DIR__.'/../config/laravel-struct.php', 'laravel-struct');
    }
}
