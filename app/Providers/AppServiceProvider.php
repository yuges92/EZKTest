<?php

namespace App\Providers;

use App\Service\ExchangeRateApi;
use App\Service\FixerAPI;
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
        $this->app->singleton(ExchangeRateApi::class, function () {
            $config = config('app.exchange_api');
            return new ExchangeRateApi($config);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
