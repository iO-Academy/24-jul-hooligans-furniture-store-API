<?php

use FurnitureStoreAPI\Services\UOMConversionService as UnitConversionService;
use PHPUnit\Framework\TestCase;

class ConversionsTest extends TestCase
{
    public function testUnitConversion_success()
    {
        $measurement = new UnitConversionService();
        UnitConversionService::setUnit('ft');
        $result = $measurement::convertUnit(100);
        $this->assertSame(0.33, $result);
    }

    public function testUnitConversion_malformed()
    {
        $measurement = new UnitConversionService();
        UnitConversionService::setUnit('ft');
        $this->expectException(TypeError::class);
        $result = $measurement::convertUnit([100]);
    }
}