<?php

namespace FurnitureStoreAPI\Products;

use FurnitureStoreAPI\Services\CurrencyConversion as CurrencyConversionService;
use JsonSerializable;

class Products implements jsonSerializable
{
    protected int $id;
    protected int $categoryID;
    protected float $price;
    protected int $stock;
    protected string $color;

    public function getPrice(): float
    {
        return CurrencyConversionService::convertCurrency($this->price);
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'price' => $this->getPrice(),
            'stock' => $this->stock,
            'color' => $this->color,
        ];
    }
}