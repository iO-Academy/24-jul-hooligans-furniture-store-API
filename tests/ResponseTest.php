<?php

use PHPUnit\Framework\TestCase;
use FurnitureStoreAPI\Response\Response;

class ResponseTest extends TestCase {

    public function testSuccessResponse_Success ()
    {
        $successResponse = new Response();
        $result = $successResponse->successResponse200();
        $this->assertSame('Successfully retrieved categories', $result);
    }

    public function testErrorResponse_Success ()
    {
        $errorResponse = new Response();
        $result = $errorResponse->errorResponse500();
        $this->assertSame('Unexpected error', $result);
    }
}