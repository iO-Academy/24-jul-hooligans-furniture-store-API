<?php

namespace FurnitureStoreAPI\Services;

class UOMConversionService
{
    public static function convertUnit(int $dimension)
    {
        if($_GET['unit'] === 'cm')
        {
            return round(($dimension / 10), 2);
        }
        elseif($_GET['unit'] === 'in')
        {
            return round(($dimension  / 25.4), 2);
        }
        elseif($_GET['unit'] === 'ft')
        {
            return round(($dimension  / 304.8), 2);
        }
        else
        {
            return $dimension ;
        }
    }
}