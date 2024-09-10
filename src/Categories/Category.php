<?php

namespace FurnitureStoreAPI\Categories;

use JsonSerializable;
class Category implements jsonSerializable
{
    private int $id;
    private string $name;

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}