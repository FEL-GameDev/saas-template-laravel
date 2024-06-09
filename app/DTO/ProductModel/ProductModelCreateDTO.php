<?php

namespace App\DTO\ProductModel;

class ProductModelCreateDTO
{

    private function __construct(
        public string $name,
        public ?string $description,
    )
    {
    }


    public static function create(string $name, ?string $description): ProductModelCreateDTO
    {
        return new self(
            name: $name,
            description: $description,
        );
    }
}
