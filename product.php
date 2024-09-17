<?php
require('vendor/autoload.php');

use FurnitureStoreAPI\Products\ProductsHydrator as ProductsHydrator;
use FurnitureStoreAPI\Response\ResponseService as Response;
use FurnitureStoreAPI\Response\LoggingService as ErrorLogging;
use FurnitureStoreAPI\Services\Headers as SetHeaders;
use FurnitureStoreAPI\DatabaseConnection\DBConnect as Connection;
use FurnitureStoreAPI\Exceptions\InvalidProductException as InvalidProductException;
use FurnitureStoreAPI\Exceptions\InvalidUnitException as InvalidUnitException;
use FurnitureStoreAPI\Exceptions\InvalidCurrencyException as InvalidCurrencyException;
use FurnitureStoreAPI\Services\UOMConversionService as UOMConversion;
use FurnitureStoreAPI\Services\CurrencyConversion as CurrencyConversion;

SetHeaders::apiHeaders();

try {
    if(isset ($_GET['id']) && is_numeric($_GET['id']))
    {
        if (empty(ProductsHydrator::getProduct(Connection::db(), intval($_GET['id']))))
        {
            throw new InvalidProductException();
        }
        else
        {
            $unitRequest = $_GET['unit'] ?? 'mm';
            if(in_array($unitRequest,['mm','cm','in','ft']))
            {
              UOMConversion::setUnit($unitRequest);
            }
            else
            {
                throw new InvalidUnitException();
            }
            $currencyRequest = $_GET['currency'] ?? 'GBP';
            if (in_array($currencyRequest, ['GBP', 'USD', 'EUR', 'YEN']))
            {
                CurrencyConversion::setCurrency($currencyRequest);
                $response = Response::apiResponse(200,'Successfully retrieved products',
                    ProductsHydrator::getProduct(Connection::db(), intval($_GET['id'])));
            } else
            {
                throw new InvalidCurrencyException();
            }
        }
    }
    else
    {
        throw new InvalidProductException();
    }
}
catch (InvalidProductException | InvalidCurrencyException | InvalidUnitException $e) {
    $response = Response::apiResponse(400, $e->getMessage(), []);
    ErrorLogging::errorLogging($e);
}
catch (Exception $e) {
    $response = Response::apiResponse(500, $e->getMessage(), []);
    ErrorLogging::errorLogging($e);
}

echo $response;