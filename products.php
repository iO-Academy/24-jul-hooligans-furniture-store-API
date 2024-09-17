<?php

require('vendor/autoload.php');

use FurnitureStoreAPI\DatabaseConnection\DBConnect as Connection;
use FurnitureStoreAPI\Exceptions\InvalidCategoryException as InvalidCategoryException;
use FurnitureStoreAPI\Exceptions\InvalidCurrencyException as InvalidCurrencyException;
use FurnitureStoreAPI\Products\ProductsHydrator as ProductsHydrator;
use FurnitureStoreAPI\Response\LoggingService as ErrorLogging;
use FurnitureStoreAPI\Response\ResponseService as Response;
use FurnitureStoreAPI\Services\CurrencyConversion as CurrencyConversion;
use FurnitureStoreAPI\Services\Headers as SetHeaders;

SetHeaders::apiHeaders();

try
{
    if (isset($_GET['cat']) && is_numeric($_GET['cat']))
    {
        $db = Connection::db();
        $categoryID = intval($_GET['cat']) ?? null;
        $inStock = $_GET['instockonly'] ?? 0;
        $productsData = ($inStock == 1)
            ? ProductsHydrator::getInStockProducts($db, $categoryID)
            : ProductsHydrator::getProducts($db, $categoryID);
        $currencyRequest = ($_GET['currency'] ?? 'GBP');

        if (empty($productsData))
        {
            throw new InvalidCategoryException();
        }
        else
        {
            if (in_array($currencyRequest, ['GBP', 'USD', 'EUR', 'YEN']))
            {
                CurrencyConversion::setCurrency($currencyRequest);
                $response = Response::apiResponse(200, 'Successfully retrieved products', $productsData);
            } else
            {
                throw new InvalidCurrencyException();
            }
        }
    }
    else
    {
        throw new InvalidCategoryException();
    }
}
catch (InvalidCategoryException | InvalidCurrencyException $e)
{
    $response = Response::apiResponse(400, $e->getMessage(), []);
    ErrorLogging::errorLogging($e);
}
catch (Exception $e)
{
    $response = Response::apiResponse(500, $e->getMessage(), []);
    ErrorLogging::errorLogging($e);
}

echo $response;