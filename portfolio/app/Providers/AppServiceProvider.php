<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SendSMSservice;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SendSMSservice::class, function ($app) {
            return new SendSMSservice();
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
