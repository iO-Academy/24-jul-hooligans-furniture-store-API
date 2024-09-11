<?php
namespace FurnitureStoreAPI\Exceptions;
class InvalidCategoryException extends \Exception
{
    public function __construct($message = 'Invalid category id')
    {
        parent::__construct($message);
    }
}