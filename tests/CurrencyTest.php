<?php

use FurnitureStoreAPI\Services\CurrencyConversion as CurrencyConversion;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    public function testCurrencyConversion_success()
    {
        $currency = new CurrencyConversion();
        CurrencyConversion::setCurrency('USD');
        $result = $currency::ConvertCurrency(100.50);
        $this->assertSame(119.60, $result);
    }

    public function testCurrencyConversion_malformed()
    {
        $currencyConversion = new CurrencyConversion();
        CurrencyConversion::setCurrency('USD');
        $this->expectException(TypeError::class);
        $result = $currencyConversion::ConvertCurrency([100.50]);
    }
}