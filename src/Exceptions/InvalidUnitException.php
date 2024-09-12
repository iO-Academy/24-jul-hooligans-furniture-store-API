<?php

namespace FurnitureStoreAPI\Exceptions;

class InvalidUnitException extends \Exception
{
    public function __construct($message = 'Invalid unit of measure')
    {
        parent::__construct($message);
    }
}