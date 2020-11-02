<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\Services\Currency\CurrencyManager;

class CurrencyServiceProvider extends ServiceProvider
{

    // Only load when necessary
    protected $defer = true;

    /**
     * Register the currencyManager into the service container
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('currency', function ($app) {
            return new CurrencyManager($app);
        });
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
}
