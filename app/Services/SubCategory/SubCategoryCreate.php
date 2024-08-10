<?php

namespace App\Services\SubCategory;

use App\DTO\Category\SubCategory\SubCategoryCreateDTO;
use App\Models\Category;
use App\Models\SubCategory;
use App\Repositories\SubCategory\SubCategoryCreateRepository;

class SubCategoryCreate
{
    public static function create(SubCategoryCreateDTO $categoryCreateDTO, Category $category): SubCategory
    {
        $createCategoryRepository = new SubCategoryCreateRepository();

        return $createCategoryRepository->create($categoryCreateDTO, $category);
    }
}
