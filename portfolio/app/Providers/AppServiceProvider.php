<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SendSMSservice;

use App\Models\Setting;
use App\Models\SmtpSetting;
use App\Models\LiveChatSetting;
use App\Models\ThemeSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;

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
            $liveChatSetting = LiveChatSetting::find(1);
            $themeSetting = ThemeSetting::first();
            $view->with('setting', $setting)
                 ->with('liveChatSetting', $liveChatSetting)
                 ->with('themeSetting', $themeSetting);
        });

        if (\Schema::hasTable('smtp_settings')) {
            $smtpsetting = SmtpSetting::first();
            if ($smtpsetting) {
                $data = [
                    'driver' => $smtpsetting->mailer,
                    'host' => $smtpsetting->host,
                    'port' => $smtpsetting->port,
                    'username' => $smtpsetting->username,
                    'password' => $smtpsetting->password,
                    'encryption' => $smtpsetting->encryption,
                    'from' => [
                        'address' => $smtpsetting->from_address,
                        'name' => 'Portfolio',
                    ],
                ];
                Config::set('mail.mailers.smtp', $data);
                Config::set('mail.from.address', $smtpsetting->from_address);
            }
        }
    }
}
