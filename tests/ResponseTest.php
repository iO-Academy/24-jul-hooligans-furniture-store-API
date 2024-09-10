<?php

use PHPUnit\Framework\TestCase;
use FurnitureStoreAPI\Response\ResponseService;

class ResponseTest extends TestCase {

    public function testResponse_Success ()
    {
        $successResponse = new ResponseService();
        $result = $successResponse->apiResponse(200, 'Successfully retrieved categories',['Bookshelves']);
        $this->assertSame(200,http_response_code());
        $this->assertSame('{"message":"Successfully retrieved categories","data":["Bookshelves"]}',$result);
    }

    public function testErrorResponse_Success ()
    {
        $successResponse = new ResponseService();
        $result = $successResponse->apiResponse(500, 'Unexpected error',[]);
        $this->assertSame(500,http_response_code());
        $this->assertSame('{"message":"Unexpected error","data":[]}',$result);
    }
}