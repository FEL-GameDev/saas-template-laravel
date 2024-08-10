<?php

namespace App\Repositories\Category;

use App\DTO\Category\CategoryUpdateDTO;
use App\Models\Category;

class CategoryUpdateRepository
{

    public function update(CategoryUpdateDTO $categoryUpdateDTO): Category
    {
        $category = Category::find($categoryUpdateDTO->id);

        $category->update(
            [
                'name' => $categoryUpdateDTO->name,
                'description' => $categoryUpdateDTO->description,
            ]
        );

        return $category;
    }
}
