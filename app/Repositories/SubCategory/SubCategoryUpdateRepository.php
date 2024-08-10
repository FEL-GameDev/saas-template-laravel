<?php

namespace App\Repositories\SubCategory;

use App\DTO\Category\SubCategory\SubCategoryUpdateDTO;
use App\Models\SubCategory;

class SubCategoryUpdateRepository
{

    public function update(SubCategoryUpdateDTO $subCategoryUpdateDTO): SubCategory
    {
        $subCategory = SubCategory::find($subCategoryUpdateDTO->id);

        $subCategory->update(
            [
                'name' => $subCategoryUpdateDTO->name,
                'description' => $subCategoryUpdateDTO->description,
            ]
        );

        return $subCategory;
    }
}
