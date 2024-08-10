<?php

namespace App\DTO\Category\SubCategory;

class SubCategoryDeleteDTO
{

    private function __construct(
        public string $id,
    )
    {
    }


    public static function create(string $id): SubCategoryDeleteDTO
    {
        return new self(
            id: $id
        );
    }
}
