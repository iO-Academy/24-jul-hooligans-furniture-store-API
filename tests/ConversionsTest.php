<?php

use FurnitureStoreAPI\Services\uomConversions as Conversions;
use PHPUnit\Framework\TestCase;

class ConversionsTest extends TestCase
{
    public function testCMConversion_success()
    {
        $result = Conversions::cmConversion(100);
        $this->assertSame(10.0, $result);
    }

    public function testCMConversion_malformed()
{
    $this->expectException(TypeError::class);
    $result = Conversions::cmConversion([100]);
}

    public function testInchConversion_success()
    {
        $result = Conversions::inchConversion(100);
        $this->assertSame(10.0, $result);
    }

    public function testInchConversion_malformed()
    {
        $this->expectException(TypeError::class);
        $result = Conversions::cmConversion([100]);
    }

}