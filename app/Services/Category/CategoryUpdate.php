<?php

namespace App\Services\Category;

use App\DTO\Category\CategoryUpdateDTO;
use App\Models\Category;

class CategoryUpdate
{
    public static function update(CategoryUpdateDTO $categoryUpdateDTO, Category $category): Category
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
