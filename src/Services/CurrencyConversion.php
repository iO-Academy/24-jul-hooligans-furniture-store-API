<?php

namespace FurnitureStoreAPI\Services;

class CurrencyConversion
{
    private static string $currency;

    public static function setCurrency($currency): void
    {
        self::$currency = $currency;
    }

    public static function convertCurrency(float $price): float
    {
        if (self::$currency === 'USD')
        {
            return round($price * 1.19, 2);
        }
        elseif (self::$currency === 'EUR')
        {
            return round($price * 1.16, 2);
        }
        elseif (self::$currency === 'YEN')
        {
            return round($price * 162.16, 2);
        }
        else
        {
            return $price;
        }
    }
}