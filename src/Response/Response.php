<?php

namespace FurnitureStoreAPI\Response;
class Response
{
    public static function successResponse200() {
        return 'Successfully retrieved categories';
    }

    public static function errorResponse500() {
        return 'Unexpected error';
    }
}