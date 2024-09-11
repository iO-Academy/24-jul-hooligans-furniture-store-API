<?php

namespace FurnitureStoreAPI\Product;
use JsonSerializable;
use FurnitureStoreAPI\Products\Products;

class Product extends Products implements JsonSerializable
{
    private int $id;
    private int $width;
    private int $height;
    private int $depth;
    private int $related;

    public function jsonSerialize(): mixed
    {
        return [
            'categoryID' => $this->categoryID,
            'width' => $this->width,
            'height' => $this->height,
            'depth' => $this->depth,
            'price' => $this->price,
            'stock' => $this->stock,
            'related' => $this->related,
            'color' => $this->color,
        ];
    }
}