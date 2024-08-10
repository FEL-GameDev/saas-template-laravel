<?php

namespace App\Repositories\SubCategory;

use App\DTO\Category\SubCategory\SubCategoryDeleteDTO;
use App\Models\SubCategory;

class SubCategoryDeleteRepository
{
    public function delete(SubCategoryDeleteDTO $subCategoryDeleteDTO): bool
    {
        $subCategory = SubCategory::find($subCategoryDeleteDTO->id);

        return $subCategory->delete();
    }
}
