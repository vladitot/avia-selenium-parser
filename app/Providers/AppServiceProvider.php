<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind('\App\Service\Service', '\App\Service\Realization\Avia');
        app()->bind('\App\Service\Request\Scenario', '\App\Service\Realization\Scenario');
        app()->bind('\App\Service\Request\Step', '\App\Service\Realization\Step');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
