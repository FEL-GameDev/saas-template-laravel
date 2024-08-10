<?php

namespace App\DTO\Category\SubCategory;

class SubCategoryUpdateDTO
{
    public function __construct(public int $id, public string $name, public ?string $description)
    {
    }

    public static function create(int $id, string $name, ?string $description): SubCategoryUpdateDTO
    {
        return new SubCategoryUpdateDTO(
            id: $id,
            name: $name,
            description: $description
        );
    }
}
