<?php

namespace App\Repositories\SubCategory;

use App\DTO\Category\SubCategory\SubCategoryCreateDTO;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryCreateRepository
{
    public function create(SubCategoryCreateDTO $subCategoryDTO, Category $category): SubCategory
    {

        $subCategory = new SubCategory([
            'name' => $subCategoryDTO->name,
            'description' => $subCategoryDTO->description,
            'category_id' => $category->id,
        ]);

        $subCategory->save();

        return $subCategory;
    }
}
