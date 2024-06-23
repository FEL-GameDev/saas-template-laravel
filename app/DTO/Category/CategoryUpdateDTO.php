<?php

namespace App\DTO\Category;

class CategoryUpdateDTO
{

    public function __construct(public string $name, public ?string $description, public array $subCategories = [],)
    {
    }

    public static function create(string $name, ?string $description, array $subCategories): CategoryUpdateDTO
    {
        return new CategoryUpdateDTO(
            name: $name,
            description: $description,
            subCategories: $subCategories
        );
    }
}
