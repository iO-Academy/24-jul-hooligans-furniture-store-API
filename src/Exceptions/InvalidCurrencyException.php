<?php

namespace FurnitureStoreAPI\Exceptions;

class InvalidCurrencyException extends \Exception
{
    public function __construct($message = 'Invalid currency')
    {
        parent::__construct($message);
    }
}