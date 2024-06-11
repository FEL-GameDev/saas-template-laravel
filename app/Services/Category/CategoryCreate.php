<?php

namespace App\Services\Category;

use App\DTO\Category\CategoryCreateDTO;
use App\DTO\Category\SubCategoryCreateDTO;
use App\Models\Category;
use App\Repositories\Category\CategoryCreateRepository;

class CategoryCreate
{
    public static function create(CategoryCreateDTO $categoryCreateDTO): Category
    {
        $createCategoryRepository = new CategoryCreateRepository();

        return $createCategoryRepository->create($categoryCreateDTO);
    }
}
