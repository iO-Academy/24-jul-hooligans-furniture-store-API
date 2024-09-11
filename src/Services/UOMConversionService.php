<?php

namespace FurnitureStoreAPI\Services;

class UOMConversionService
{
    private static $unit;

    public static function setUnit($unit)
    {
        self::$unit = $unit;
    }

    public static function convertUnit(int $dimension) :float
    {
        if(self::$unit === 'cm')
        {
            return round(($dimension / 10), 2);
        }
        elseif(self::$unit === 'in')
        {
            return round(($dimension  / 25.4), 2);
        }
        elseif(self::$unit === 'ft')
        {
            return round(($dimension  / 304.8), 2);
        }
        else
        {
            return $dimension ;
        }
    }
}