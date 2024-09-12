<?php

namespace FurnitureStoreAPI\Product;

use FurnitureStoreAPI\Products\Products;
use FurnitureStoreAPI\Services\UOMConversionService as UnitConversionService;
use JsonSerializable;

class Product extends Products implements JsonSerializable
{
    private int $width;
    private int $height;
    private int $depth;
    private int $related;

    public function getWidth(): int
    {
        return UnitConversionService::convertUnit($this->width);
    }

    public function getHeight(): int
    {
        return UnitConversionService::convertUnit($this->height);
    }

    public function getDepth(): int
    {
        return UnitConversionService::convertUnit($this->depth);
    }


    public function jsonSerialize(): mixed
    {
        return [
            'categoryID' => $this->categoryID,
            'width' => $this->getWidth(),
            'height' => $this->getHeight(),
            'depth' => $this->getDepth(),
            'price' => $this->getPrice(),
            'stock' => $this->stock,
            'related' => $this->related,
            'color' => $this->color,
        ];
    }
}