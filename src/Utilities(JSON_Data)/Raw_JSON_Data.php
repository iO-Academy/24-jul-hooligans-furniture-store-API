<?php

require('../../vendor/autoload.php');

use FurnitureStoreAPI\DatabaseConnection\DBConnect as Connection;


$db = Connection::db();

$categories = [];

$filename = 'furniture.json';
$rawData = json_decode(file_get_contents($filename), true);

// Create a list of unique categories
foreach ($rawData as $data) {
    $categories[] = $data['name'];
}

$uniqueCategories = array_unique($categories);

$sortedArray = sort($uniqueCategories);

// map categories to unique ID from Cat Table
$map = [
    "Book case" => 1,
    "Chair" => 2,
    "Chest" => 3,
    "Desk" => 4,
    "Draws" => 5,
    "Office Chair" => 6,
    "Shelves" => 7,
    "Sofa" => 8,
    "TV Stand" => 9,
    "Table" => 10,
    "Wardrobe" => 11];

// Script to populate Database
foreach ($rawData as $data) {
    $catName = $data['name'];
    $catID = $map[$catName];
    $price = trim($data['price'], '£');
    $priceFloat = floatval($price);
    $query = $db->prepare(
        "INSERT INTO Products (categoryID, name, width, height, depth, price, stock, related, color)
                    VALUES (:categoryID, :name, :width, :height, :depth, :price, :stock, :related, :color)");
    $query->execute(['categoryID' => $catID, 'name' => $data['name'], 'width' => $data['width'], 'height' => $data['height'], 'depth' => $data['depth'], 'price' => $priceFloat,
        'stock' => $data['stock'], 'related' => $data['related'], 'color' => $data['color']]);
};