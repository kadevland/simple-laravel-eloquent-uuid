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
        if (\function_exists('config_path')) {
            $this->publishes([
                \realpath(__DIR__ . '/../config/model-uuid.php') => \config_path('model-uuid.php'),
            ]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
