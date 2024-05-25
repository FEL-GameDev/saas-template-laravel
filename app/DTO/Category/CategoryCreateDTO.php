<?php

namespace App\DTO\Category;

class CategoryCreateDTO
{

    private function __construct(
        public string $name,
        public ?string $description,
    )
    {
    }


    public static function create(string $name, ?string $description): CategoryCreateDTO
    {
        return new self(
            name: $name,
            description: $description,
        );
    }
}
