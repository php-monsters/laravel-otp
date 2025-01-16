<?php

namespace PhpMonsters\Otp;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class OtpServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->alias(Otp::class, 'otp');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'otp');

        $this->publishes([
            __DIR__.'/../resources/lang' => $this->app->langPath('vendor/otp'),
            __DIR__.'/../config/otp.php' => config_path('otp.php'),
        ]);
    }
}
