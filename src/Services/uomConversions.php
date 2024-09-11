<?php

namespace FurnitureStoreAPI\Services;

class uomConversions
{
    public static function uomConversion(int $value, string $uom)
    {
        if ($uom === 'cm')
        {
            return round(($value / 10), 2);
        }
        elseif ($uom === 'in') {
            return round(($value / 25.4), 2);
        }
        elseif ($uom === 'ft') {
            return round(($value / 304.8), 2);
        }
        else {
            return $value;
        }
    }
}