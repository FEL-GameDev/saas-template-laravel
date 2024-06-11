<?php

namespace App\DTO\Category\SubCategory;

class SubCategoryCreateDTO
{

    private function __construct(
        public string $name,
        public ?string $description,
    )
    {
    }


    public static function create(string $name, ?string $description): SubCategoryCreateDTO
    {
        return new self(
            name: $name,
            description: $description,
        );
    }
}
