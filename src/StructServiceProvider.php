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
                __DIR__.'/../config/struct.php' => config_path('struct.php'),
            ], 'struct');
        }

        $this->mergeConfigFrom(__DIR__.'/../config/struct.php', 'struct');
    }
}
