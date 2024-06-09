<?php

namespace App\DTO\ProductModel;

class ProductModelUpdateDTO
{

    public string $name;
    public string $description;

    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public static function create(string $name, string $description): ProductModelUpdateDTO
    {
        return new ProductModelUpdateDTO(
            name: $name,
            description: $description
        );
    }
}
