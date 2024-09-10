<?php

namespace FurnitureStoreAPI\Services;

class Headers
{
    public static function apiHeaders(): void
    {
        header('Content-Type: application/json; charset=utf-8');
        header("Access-Control-Allow-Origin: *");
    }
}