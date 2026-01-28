<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SendSMSservice;

use App\Models\Setting;
use Illuminate\Support\Facades\View;

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
        View::composer('*', function ($view) {
            $setting = Setting::find(1);
            $view->with('setting', $setting);
        });
    }
}
