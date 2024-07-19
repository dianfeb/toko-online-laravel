<?php

namespace App\Providers;

use Dipantry\Rajaongkir\Rajaongkir;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(Rajaongkir::class, function ($app) {
            $apiKey = config('rajaongkir.api_key');
            $package = config('rajaongkir.package', 'starter');

            if (is_null($apiKey)) {
                throw new \RuntimeException('Rajaongkir API key is not configured.');
            }

            return new Rajaongkir($apiKey, $package);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
