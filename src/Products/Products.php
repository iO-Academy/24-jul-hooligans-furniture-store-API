<?php

namespace FurnitureStoreAPI\Products;

use JsonSerializable;

class Products implements jsonSerializable
{
    protected int $categoryID;
    protected float $price;
    protected int $stock;
    protected string $color;

    public function jsonSerialize(): mixed
    {
        return [
            'categoryID' => $this->categoryID,
            'price' => $this->price,
            'stock' => $this->stock,
            'color' => $this->color,
        ];
    }
}