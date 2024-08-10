<?php

namespace App\Services\Category;

use App\DTO\Category\CategoryUpdateDTO;
use App\DTO\Category\SubCategory\SubCategoryCreateDTO;
use App\DTO\Category\SubCategory\SubCategoryDeleteDTO;
use App\DTO\Category\SubCategory\SubCategoryUpdateDTO;
use App\Models\Category;
use App\Repositories\Category\CategoryUpdateRepository;
use App\Services\SubCategory\SubCategoryCreate;
use App\Services\SubCategory\SubCategoryDelete;
use App\Services\SubCategory\SubCategoryUpdate;
use Illuminate\Support\Facades\DB;

class CategoryUpdate
{
    public static function update(CategoryUpdateDTO $categoryUpdateDTO): Category
    {
        return DB::transaction(function () use ($categoryUpdateDTO) {
            $category = Category::find($categoryUpdateDTO->id);

            $categoryUpdateRepository = new CategoryUpdateRepository();
            $categoryUpdateRepository->update($categoryUpdateDTO);

            foreach($categoryUpdateDTO->subCategories as $subCategory) {
                if ($subCategory instanceof SubCategoryCreateDTO) {
                    SubCategoryCreate::create($subCategory, $category);
                } elseif ($subCategory instanceof SubCategoryUpdateDTO) {
                    SubCategoryUpdate::update($subCategory);
                } elseif ($subCategory instanceof SubCategoryDeleteDTO) {
                    SubCategoryDelete::delete($subCategory);
                }
            }

            return $category;
        });
    }
}
