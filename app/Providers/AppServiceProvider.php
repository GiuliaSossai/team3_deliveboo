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
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => env('BRAINTREE_ENV', false),
                    'merchantId' => env('BRAINTREE_MERCHANT_ID', false),
                    'publicKey' => env('BRAINTREE_PUBLIC_KEY', false),
                    'privateKey' => env('BRAINTREE_PRIVATE_KEY', false),
                ]
            );
        });
    }
}
