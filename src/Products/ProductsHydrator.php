<?php

namespace FurnitureStoreAPI\Products;
use FurnitureStoreAPI\Product\Product;
use \PDO;
class ProductsHydrator
{
    public static function getProducts(PDO $db, int $categoryID)
    {
        $query = $db->prepare("SELECT `categoryID`, `price`, `stock`, `color` FROM `Products` 
                                                                                WHERE `categoryID` = :categoryID");
        $query->bindParam(':categoryID', $categoryID);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, Products::class);
        return $query->fetchAll();
    }

    public static function getProduct(PDO $db, int $productID)
    {
        $query = $db->prepare("SELECT `id`, `categoryID`, `width`, `height`, `depth`, `price`, `stock`,
        `related`, `color` FROM `Products` WHERE `id` = :productID");
        $query->bindParam(':productID', $productID);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, Product::class);
        return $query->fetch();
    }

}