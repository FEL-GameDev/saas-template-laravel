<?php

namespace App\DTO\ProductModel;

class ProductModelCreateDTO
{

    private function __construct(
        public string $name,
    )
    {
    }


    public static function create(string $name): ProductModelCreateDTO
    {
        return new self(
            name: $name,
        );
    }
}
