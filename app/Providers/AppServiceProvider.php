<?php

namespace App\Providers;

use Braintree\Gateway;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function($app){
            return new Gateway([
                  'enviroment' => 'sandbox',
                  'merchantId' => '64nmzg3dhd34vvh7',
                  'publicKey' => 'gyy6c2h63b9hc5x3',
                  'privateKey' => '5e0a37a0db2beef5cb29a7a131cd84c5'
                ]
                );
        });
    }
}

