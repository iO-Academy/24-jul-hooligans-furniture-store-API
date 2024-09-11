<?php

namespace FurnitureStoreAPI\Products;

use \PDO;

class ProductsHydrator
{
    public static function getProducts(PDO $db, int $categoryID)
    {
        $query = $db->prepare("SELECT `categoryID`, `price`, `stock`, `color` 
                                FROM `Products` WHERE `categoryID` = :categoryID");
        $query->bindParam(':categoryID', $categoryID);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, Products::class);
        return $query->fetchAll();
    }
}