<?php

namespace Kadevland\Eloquent\Uuid;

use Illuminate\Support\ServiceProvider;

class UuidServiceProvider extends ServiceProvider
{


    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__ . '/../config/eloquent-uuid.php' => config_path('model-uuid.php')
        ], 'simple-laravel-eloquent-uuid');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/eloquent-uuid.php', 'eloquent-uuid');
    }
}
