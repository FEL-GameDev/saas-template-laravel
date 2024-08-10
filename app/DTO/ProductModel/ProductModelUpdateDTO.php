<?php

namespace App\DTO\ProductModel;

class ProductModelUpdateDTO
{
    public function __construct(public string $name, public ?string $description)
    {
    }

    public static function create(string $name, ?string $description): ProductModelUpdateDTO
    {
        return new ProductModelUpdateDTO(
            name: $name,
            description: $description
        );
    }
}
