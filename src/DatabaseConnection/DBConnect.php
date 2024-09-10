<?php

namespace FurnitureStoreAPI\DatabaseConnection;

use PDO;

class DBConnect
{

    public static function db(): PDO
    {
        return new PDO ('mysql:host=db;dbname=Furniture_Store', 'root', 'password');
    }

}