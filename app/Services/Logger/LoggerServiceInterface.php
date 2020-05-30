<?php

namespace App\Services\Logger;

interface LoggerServiceInterface {
    public function appLog($level, $message, $context = []);
}
