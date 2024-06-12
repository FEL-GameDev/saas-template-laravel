<?php

namespace App\Repositories\Category;

use App\DTO\Category\CategoryCreateDTO;
use App\Models\Category;
use App\Models\SubCategory;
use App\Repositories\Interfaces\Category\CategoryCreateRepositoryInterface;
use DB;

class CategoryCreateRepository implements CategoryCreateRepositoryInterface
{

    public function create(CategoryCreateDTO $categoryCreateDTO): Category
    {
        return DB::transaction(function () use ($categoryCreateDTO) {
            $category = new Category([
                'name' => $categoryCreateDTO->name,
                'description' => $categoryCreateDTO->description,
            ]);
            $category->save();

            $subCategories = collect($categoryCreateDTO->subCategories)->map(function($subCategory) use ($category) {
                return new SubCategory([
                    'name' => $subCategory->name,
                    'description' => $subCategory->description,
                    'category_id' => $category->id,
                ]);
            });
            $category->subCategories()->saveMany($subCategories);
            $category->save();

            return $category;
        });
    }
}
