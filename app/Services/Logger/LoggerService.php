<?php

namespace App\Services\Logger;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LoggerService implements LoggerServiceInterface {
    protected $logger;
    
    /**
    * @return LogerService
    */
    public function __construct()
    {
        $this->logger = new Logger('example');
        $this->logger->pushHandler(new StreamHandler('storage/logs/laravel.log'));
    }

    public function appLog($level, $message, $context = [])
    {
        $this->logger->log($level, $message, $context);
    }
}
