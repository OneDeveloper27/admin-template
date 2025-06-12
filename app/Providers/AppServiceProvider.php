<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Passport::tokensExpireIn(now()->addMinutes(110));
        Passport::refreshTokensExpireIn(now()->addHours(2));
        Passport::personalAccessTokensExpireIn(now()->addDays(30));
    }
}
