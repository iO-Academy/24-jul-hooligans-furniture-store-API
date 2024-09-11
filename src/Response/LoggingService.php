<?php

namespace FurnitureStoreAPI\Response;

class LoggingService
{
public static function errorLogging($e): void
{
    $logPath = 'Logs/errors.log';
    $errorMessage = $e->getMessage();
    file_put_contents($logPath, $errorMessage . "\n", FILE_APPEND);
}
}