<?php

require('vendor/autoload.php');

use FurnitureStoreAPI\Products\ProductsHydrator as ProductsHydrator;
use FurnitureStoreAPI\DatabaseConnection\DBConnect as Connection;
use FurnitureStoreAPI\Response\LoggingService as ErrorLogging;
use FurnitureStoreAPI\Response\ResponseService as Response;
use FurnitureStoreAPI\Services\Headers as SetHeaders;
use FurnitureStoreAPI\Exceptions\InvalidCategoryException as InvalidCategoryException;

SetHeaders::apiHeaders();

try {
    if (isset($_GET['cat']) && is_numeric($_GET['cat'])) {
        if ((empty(ProductsHydrator::getProducts(Connection::db(), intval($_GET['cat'])))))
        {
            throw new InvalidCategoryException();
        }
        else
        {
            $response = Response::apiResponse(200, 'Successfully retrieved products',
                ProductsHydrator::getProducts(Connection::db(), intval($_GET['cat'])));
        }
    }
    else {
        throw new InvalidCategoryException();
    }
} catch (InvalidCategoryException $e) {
    $response = Response::apiResponse(400, $e->getMessage(), []);
    ErrorLogging::errorLogging($e);
} catch (Exception $e) {
    $response = Response::apiResponse(500, $e->getMessage(), []);
    ErrorLogging::errorLogging($e);
}

echo $response;