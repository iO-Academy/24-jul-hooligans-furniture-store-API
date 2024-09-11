<?php
require('vendor/autoload.php');

use FurnitureStoreAPI\Products\ProductsHydrator as ProductsHydrator;
use FurnitureStoreAPI\Response\ResponseService as Response;
//use FurnitureStoreAPI\Response\LoggingService as ErrorLogging;
use FurnitureStoreAPI\Services\Headers as SetHeaders;
use FurnitureStoreAPI\DatabaseConnection\DBConnect as Connection;

SetHeaders::apiHeaders();

try {
    if(isset ($_GET['id']) && $_GET['id'] <= 500 && $_GET['id'] > 0){
        echo Response::apiResponse(200, 'Successfully retrieved product',
            ProductsHydrator::getProduct(Connection::db(), intval($_GET['id'])));
    }
}



