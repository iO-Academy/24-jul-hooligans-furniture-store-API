<?php

require('vendor/autoload.php');

use FurnitureStoreAPI\Products\ProductsHydrator as ProductsHydrator;
use FurnitureStoreAPI\DatabaseConnection\DBConnect as Connection;
use FurnitureStoreAPI\Response\LoggingService as ErrorLogging;
use FurnitureStoreAPI\Response\ResponseService as Response;
use FurnitureStoreAPI\Services\Headers as SetHeaders;

SetHeaders::apiHeaders();

    try {
        if (isset($_GET['cat'])) {
            echo Response::apiResponse(200, 'Successfully retrieved categories', ProductsHydrator::getProducts(Connection::db(), intval($_GET['cat'])));
        }
        else
        {
            echo Response::apiResponse(400, 'Unexpected error', []);
        }
    } catch (Exception $e)
    {
        ErrorLogging::errorLogging($e);
    }