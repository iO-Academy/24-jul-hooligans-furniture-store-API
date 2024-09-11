<?php

use FurnitureStoreAPI\Services\UOMConversionService as UnitConversionService;
use PHPUnit\Framework\TestCase;

class ConversionsTest extends TestCase
{
    public function testCMConversion_success()
    {
        $_GET['unit'] = 'ft';
        $measurement = new UnitConversionService();
        $result = $measurement::convertUnit(100);
        $this->assertSame(0.33, $result);
    }

    public function testCMConversion_malformed()
    {
        $_GET['unit'] = 'ft';
        $measurement = new UnitConversionService();
        $this->expectException(TypeError::class);
        $result = $measurement::convertUnit([100]);
    }
}