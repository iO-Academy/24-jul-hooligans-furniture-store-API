<?php

namespace FurnitureStoreAPI\Exceptions;

class InvalidProductException extends \Exception
{
    public function __construct($message = "Invalid product id")
    {
        parent::__construct($message);
    }
}