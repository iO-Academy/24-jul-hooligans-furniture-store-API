<?php

namespace FurnitureStoreAPI\Response;
class ResponseService
{
    public static function apiResponse($responseCode, $message, $data)
    {
        http_response_code($responseCode);
        return json_encode(["message" => $message, "data" => $data]);
    }
}