<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Paypal;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *Aquí utilizando una clase inventada Paypal
     * @return void
     */
    public function register()
    {
        $this->app->bind(Paypal::class, function ($app) {
            return new Paypal(env('PAYPAL_ID'),env('PAYPAL_SECRET'));
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
