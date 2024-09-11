<?php

require('vendor/autoload.php');

use FurnitureStoreAPI\Products\ProductsHydrator as ProductsHydrator;
use FurnitureStoreAPI\DatabaseConnection\DBConnect as Connection;
use FurnitureStoreAPI\Response\LoggingService as ErrorLogging;
use FurnitureStoreAPI\Response\ResponseService as Response;
use FurnitureStoreAPI\Services\Headers as SetHeaders;

SetHeaders::apiHeaders();
    try
    {
        if (isset($_GET['cat']) && $_GET['cat'] < 12 && $_GET['cat'] > 0)
        {
            echo Response::apiResponse(200, 'Successfully retrieved products',
                ProductsHydrator::getProducts(Connection::db(), intval($_GET['cat'])));
        }
        else
        {
            echo Response::apiResponse(400, 'Invalid category id', []);
        }
    }
    catch (Exception $e)
        {
            echo Response::apiResponse(500, 'Unexpected error', []);
            ErrorLogging::errorLogging($e);
        }