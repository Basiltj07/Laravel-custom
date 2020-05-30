<?php

namespace App\Services\Logger;

use Illuminate\Support\ServiceProvider;

class LoggerServiceProvider extends ServiceProvider {
    /**
    * Registers the service in the IoC Container
    * 
    */
    public function register()
    {
        // Binds 'loggerService' to the result of the closure
        $this->app->bind('App\Services\Logger\LoggerServiceInterface', function () {
            return new LoggerService();
        });
    }
}
