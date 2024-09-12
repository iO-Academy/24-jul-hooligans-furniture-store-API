<?php

require('vendor/autoload.php');

use FurnitureStoreAPI\Products\ProductsHydrator as ProductsHydrator;
use FurnitureStoreAPI\DatabaseConnection\DBConnect as Connection;
use FurnitureStoreAPI\Response\LoggingService as ErrorLogging;
use FurnitureStoreAPI\Response\ResponseService as Response;
use FurnitureStoreAPI\Services\Headers as SetHeaders;
use FurnitureStoreAPI\Exceptions\InvalidCategoryException as InvalidCategoryException;

SetHeaders::apiHeaders();

$db = Connection::db();
$categoryID = intval($_GET['cat']);
$productsData = ProductsHydrator::getProducts($db, $categoryID);
$inStockProductsData = ProductsHydrator::getInStockProducts($db, $categoryID);

try {
    if (isset($_GET['cat']) && is_numeric($_GET['cat'])) {
        if (empty($productsData))
        {
            throw new InvalidCategoryException();
        }
        else if ($_GET['instockonly'] == 1)
        {
            $response = Response::apiResponse(200, 'Successfully retrieved products', $inStockProductsData);
        }
        else
        {
            $response = Response::apiResponse(200, 'Successfully retrieved products', $productsData);
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