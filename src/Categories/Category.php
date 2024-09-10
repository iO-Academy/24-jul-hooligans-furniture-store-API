<?php

namespace FurnitureStoreAPI\Categories;

use JsonSerializable;
class Category implements jsonSerializable
{
    private int $id;
    private string $name;
    private string $products;

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'products' => $this->products
        ];
    }
}