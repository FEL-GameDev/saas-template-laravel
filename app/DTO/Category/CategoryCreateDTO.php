<?php

namespace App\DTO\Category;

class CategoryCreateDTO
{

    private function __construct(
        public string $name,
        public ?string $description,
        public array $subCategories = [],
    )
    {
    }


    public static function create(string $name, ?string $description, array $subCategories): CategoryCreateDTO
    {
        return new self(
            name: $name,
            description: $description,
            subCategories: $subCategories,
        );
    }
}
