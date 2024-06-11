<?php

namespace App\DTO\Category\SubCategory;

class SubCategoryUpdateDTO
{

    public string $name;
    public string $description;

    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public static function create(string $name, string $description): SubCategoryUpdateDTO
    {
        return new SubCategoryUpdateDTO(
            name: $name,
            description: $description
        );
    }
}
