<?php

namespace App\Services\SubCategory;

use App\DTO\Category\SubCategory\SubCategoryDeleteDTO;
use App\Repositories\SubCategory\SubCategoryDeleteRepository;

class SubCategoryDelete
{
    public static function delete(SubCategoryDeleteDTO $subCategoryDeleteDTO): bool
    {
        $subCategoryDeleteRepository = new SubCategoryDeleteRepository();
        return $subCategoryDeleteRepository->delete($subCategoryDeleteDTO);
    }
}
