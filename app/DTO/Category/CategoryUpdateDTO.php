<?php

namespace App\DTO\Category;

class CategoryUpdateDTO
{

    public function __construct(public int $id, public string $name, public ?string $description, public array $subCategories = [],)
    {
    }

    public static function create(int $id, string $name, ?string $description, array $subCategories): CategoryUpdateDTO
    {
        return new CategoryUpdateDTO(
            id: $id,
            name: $name,
            description: $description,
            subCategories: $subCategories
        );
    }
}
