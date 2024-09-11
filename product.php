<?php
require('vendor/autoload.php');

use FurnitureStoreAPI\Products\ProductsHydrator as ProductsHydrator;
use FurnitureStoreAPI\Response\ResponseService as Response;
use FurnitureStoreAPI\Response\LoggingService as ErrorLogging;
use FurnitureStoreAPI\Services\Headers as SetHeaders;
use FurnitureStoreAPI\DatabaseConnection\DBConnect as Connection;
use FurnitureStoreAPI\Exceptions\InvalidProductException as InvalidProductException;

SetHeaders::apiHeaders();

try {
    if(isset ($_GET['id']) && is_numeric($_GET['id'])) {
        if (empty(ProductsHydrator::getProduct(Connection::db(), intval($_GET['id']))))
        {
            throw new InvalidProductException();
        }
        else
        {
            $response = Response::apiResponse(200, 'Successfully retrieved product',
                ProductsHydrator::getProduct(Connection::db(), intval($_GET['id'])));
        }
    }
    else {
        throw new InvalidProductException();
    }
} catch (InvalidProductException $e) {
    $response = Response::apiResponse(400, $e->getMessage(), []);
    ErrorLogging::errorLogging($e);
} catch (Exception $e) {
    $response = Response::apiResponse(500, $e->getMessage(), []);
    ErrorLogging::errorLogging($e);
}

echo $response;

