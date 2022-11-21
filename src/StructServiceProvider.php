<?php

declare(strict_types=1);

namespace Signifly\Struct;

use Illuminate\Support\ServiceProvider;

class StructServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/struct.php', 'struct');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/struct.php' => config_path('struct.php'),
            ], 'struct');
        }
    }
}
