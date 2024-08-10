<?php

namespace App\Services\SubCategory;

use App\DTO\Category\SubCategory\SubCategoryUpdateDTO;
use App\Models\SubCategory;
use App\Repositories\SubCategory\SubCategoryUpdateRepository;

class SubCategoryUpdate
{
    public static function update(SubCategoryUpdateDTO $categoryUpdateDTO): SubCategory
    {
        $subCategoryUpdateRepository = new SubCategoryUpdateRepository();

        return $subCategoryUpdateRepository->update($categoryUpdateDTO);
    }
}
