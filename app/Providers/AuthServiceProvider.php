<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Config;
class AuthServiceProvider extends ServiceProvider {
    protected $policies = [];
    public function boot() {
        $this->registerPolicies();
        Passport::routes();
        Passport::tokensExpireIn(now()->addDays(Config::get('constants.TOKENS.TOKEN_EXPIRY_DAYS')));
        Passport::refreshTokensExpireIn(now()->addDays(Config::get('constants.TOKENS.REFRESH_TOKEN_EXPIRY_DAYS')));
    }
}
