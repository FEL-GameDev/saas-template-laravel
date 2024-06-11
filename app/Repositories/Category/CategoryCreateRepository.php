<?php

namespace App\Repositories\Category;

use App\DTO\Category\CategoryCreateDTO;
use App\Models\Category;
use App\Models\SubCategory;
use App\Repositories\Interfaces\Category\CategoryCreateRepositoryInterface;

class CategoryCreateRepository implements CategoryCreateRepositoryInterface
{

    public function create(CategoryCreateDTO $categoryCreateDTO): Category
    {
        // Create a new category instance
        $category = new Category([
            'name' => $categoryCreateDTO->name,
            'description' => $categoryCreateDTO->description,
        ]);
        $category->save();

        // Create an array of new subcategory instances
        $subCategories = collect($categoryCreateDTO->subCategories)->map(function($subCategory) use ($category) {
            return new SubCategory([
                'name' => $subCategory->name,
                'description' => $subCategory->description,
                'category_id' => $category->id,
            ]);
        });

        // Associate the subcategories with the category
        $category->subCategories()->saveMany($subCategories);

        // Save the category and its subcategories to the database
        $category->save();

        return $category;
    }
}
