<?php

require('vendor/autoload.php');
use FurnitureStoreAPI\Categories\CategoryHydrator as CategoryHydrator;

header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");

try {
    $db = new PDO('mysql:host=db; dbname=Furniture_Store', 'root', 'password');
    $result = CategoryHydrator::getCategory($db);
    echo json_encode($result);
} catch (Exception $e) {
    $logPath = 'logs/errors.log';
    $errorMessage = $e->getMessage();
    file_put_contents($logPath, $errorMessage, FILE_APPEND);
}




