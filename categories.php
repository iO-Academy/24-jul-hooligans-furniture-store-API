<?php

require('vendor/autoload.php');
use FurnitureStoreAPI\Categories\CategoryHydrator as CategoryHydrator;
use FurnitureStoreAPI\Response\Response as Response;

header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");

try {
    $responseCode = http_response_code(200);
        $db = new PDO('mysql:host=db; dbname=Furniture_Store', 'root', 'password');
        $result = CategoryHydrator::getCategory($db);
        $response = Response::successResponse200();
        $content = ["message"=> $response, "data"=> $result];
        echo json_encode($content);
} catch (Exception $e) {
    $responseCode = http_response_code(500);
    $response = Response::errorResponse500();
    $content = ["message"=> $response, "data"=> []];
    echo json_encode($content);
    $logPath = 'Logs/errors.log';
    $errorMessage = $e->getMessage();
    file_put_contents($logPath, $errorMessage, FILE_APPEND);
}




