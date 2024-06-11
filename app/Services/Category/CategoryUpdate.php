<?php

namespace App\Services\Category;

use App\DTO\Category\SubCategoryUpdateDTO;
use App\Models\Category;

class CategoryUpdate
{
    public static function update(SubCategoryUpdateDTO $categoryUpdateDTO, Category $category): Category
    {
        $category->update(
            [
                'name' => $categoryUpdateDTO->name,
                'description' => $categoryUpdateDTO->description,
            ]
        );

        return $category;
    }
}
