<?php

namespace FurnitureStoreAPI\Services;

class CurrencyConversion
{
    private static string $currency;

    public static function setCurrency($currency): void
    {
        self::$currency = $currency;
    }

    public static function ConvertCurrency(float $price): float
    {
        if (self::$currency === 'USD')
        {
            $output = round($price * 1.19, 2);
        }
        elseif (self::$currency === 'EUR')
        {
            $output = round($price * 1.16, 2);
        }
        elseif (self::$currency === 'YEN')
        {
            $output = round($price * 162.16, 2);
        }
        else
        {
            $output = $price;
        }
        return $output;
    }
}