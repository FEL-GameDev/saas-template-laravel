<?php

namespace App\Http\Controllers;

use App\DTO\Category\CategoryCreateDTO;
use App\Http\Requests\Category\CategoryCreateRequest;
use App\Models\Category;
use App\Services\Category\CategoryCreate;
use App\Services\Category\GetCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', [Category::class, $request->user()]);

        return Inertia::render("Categories/CategoriesIndex", [
            'categories' => GetCategory::getAll($request->user()->account_id),
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

        $categoryCreateDTO = CategoryCreateDTO::create(
            accountId: $request->user()->account->id,
            name: $request->name,
            description: $request->description
        );

        CategoryCreate::create($categoryCreateDTO);
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        $this->authorize('delete', [Category::class, $category]);

        $category->delete();
    }
}
