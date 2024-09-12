<?php

namespace FurnitureStoreAPI\Product;
use JsonSerializable;
use FurnitureStoreAPI\Products\Products;
use FurnitureStoreAPI\Services\UOMConversionService as UnitConversionService;
use FurnitureStoreAPI\Services\CurrencyConversion as CurrencyConversionService;

class Product extends Products implements JsonSerializable
{
    private int $width;
    private int $height;
    private int $depth;
    private int $related;

    public function jsonSerialize(): mixed
    {
        return [
            'categoryID' => $this->categoryID,
            'width' =>  UnitConversionService::convertUnit($this->width),
            'height' => UnitConversionService::convertUnit($this->height),
            'depth' => UnitConversionService::convertUnit($this->depth),
            'price' => CurrencyConversionService::convertCurrency($this->price),
            'stock' => $this->stock,
            'related' => $this->related,
            'color' => $this->color,
        ];
    }
}