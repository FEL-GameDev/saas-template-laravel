<?php

namespace App\DTO\Category;

class CategoryUpdateDTO
{

    public string $name;
    public string $description;

    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public static function create(string $name, string $description): CategoryUpdateDTO
    {
        return new CategoryUpdateDTO(
            name: $name,
            description: $description
        );
    }
}
