<?php

namespace FurnitureStoreAPI\Categories;
use \PDO;
class CategoryHydrator
{
    public static function getCategory(PDO $db)
    {
            $query = $db->prepare("SELECT `id`, `name`, `products` FROM `Categories`");
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS, Category::class);
            return $query->fetchAll();
    }
}