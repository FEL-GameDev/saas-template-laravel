<?php

namespace App\Repositories\Category;

use App\DTO\Category\CategoryCreateDTO;
use App\Models\Category;
use App\Repositories\Interfaces\Category\CategoryCreateRepositoryInterface;

class CategoryCreateRepository implements CategoryCreateRepositoryInterface
{

    public function create(CategoryCreateDTO $categoryCreateDTO): Category
    {
        return Category::create([
            'name' => $categoryCreateDTO->name,
            'description' => $categoryCreateDTO->description,
        ]);
    }
}
