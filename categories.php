<?php

require('vendor/autoload.php');

use FurnitureStoreAPI\Categories\CategoryHydrator as CategoryHydrator;
use FurnitureStoreAPI\DatabaseConnection\DBConnect as Connection;
use FurnitureStoreAPI\Response\LoggingService as ErrorLogging;
use FurnitureStoreAPI\Response\ResponseService as Response;
use FurnitureStoreAPI\Services\Headers as SetHeaders;

SetHeaders::apiHeaders();

try {
    echo Response::apiResponse(200, 'Successfully retrieved categories', CategoryHydrator::getCategory(Connection::db()));
} catch (Exception $e) {
    echo Response::apiResponse(500, 'Unexpected error', []);
    ErrorLogging::errorLogging($e);
}




