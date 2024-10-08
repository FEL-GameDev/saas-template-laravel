<?php

namespace App\Http\Controllers;

use App\DTO\Category\CategoryCreateDTO;
use App\DTO\Category\CategoryUpdateDTO;
use App\DTO\Category\SubCategory\SubCategoryCreateDTO;
use App\DTO\Category\SubCategory\SubCategoryDeleteDTO;
use App\DTO\Category\SubCategory\SubCategoryUpdateDTO;
use App\Http\Requests\Category\CategoryCreateRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Models\Category;
use App\Services\Category\CategoryCreate;
use App\Services\Category\CategoryDelete;
use App\Services\Category\CategoryGet;
use App\Services\Category\CategoryUpdate;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', [Category::class, $request->user()]);

        return Inertia::render("Categories/CategoriesIndex", [
            'categories' => CategoryGet::getAllWithCount(),
        ]);
    }

    public function create(Request $request)
    {
        $this->authorize('create', [Category::class, $request->user()]);

        return Inertia::render("Categories/CategoriesCreate", []);
    }

    public function store(CategoryCreateRequest $request)
    {
        $this->authorize('create', [Category::class, $request->user()]);

        $subCategories = $this->parseSubCategories($request->subCategories);
        $categoryCreateDTO = CategoryCreateDTO::create(
            name: $request->name,
            description: $request->description,
            subCategories: $subCategories,
        );

        CategoryCreate::create($categoryCreateDTO);

        return to_route('categories.index');
    }

    public function edit(Category $category)
    {
        $this->authorize('update', [Category::class, $category]);

        return Inertia::render("Categories/CategoriesEdit", [
            'category' => $category->load('subCategories')
        ]);
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $this->authorize('update', [Category::class, $category]);

        $subCategories = $this->parseSubCategories($request->subCategories);
        $categoryUpdateDTO = CategoryUpdateDTO::create(
            id: $category->id,
            name: $request->name,
            description: $request->description,
            subCategories: $subCategories,
        );

        CategoryUpdate::update($categoryUpdateDTO);
    }

    public function destroy(Category $category)
    {
        $this->authorize('delete', [Category::class, $category]);

        CategoryDelete::delete($category);
    }

    private function parseSubCategories($subCategories)
    {
        $subCategories = collect($subCategories)->map(function ($subCategory) {
            if (empty($subCategory['name']) && empty($subCategory['description'])) {
                return null;
            }

            if (array_key_exists('delete', $subCategory) && $subCategory['delete']) {
                return SubCategoryDeleteDTO::create(
                    id: $subCategory['id']
                );
            }

            if (array_key_exists('id',$subCategory)) {
                return SubCategoryUpdateDTO::create(
                    id: $subCategory['id'],
                    name: $subCategory['name'],
                    description: $subCategory['description']
                );
            }

            return SubCategoryCreateDTO::create(
                name: $subCategory['name'],
                description: $subCategory['description']
            );
        })->toArray();

        return array_filter($subCategories, function($subCategory) {
            return $subCategory !== null;
        });
    }
}
