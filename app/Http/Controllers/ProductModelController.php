<?php

namespace App\Http\Controllers;

use App\DTO\ProductModel\ProductModelCreateDTO;
use App\Http\Requests\ProductModel\ProductModelCreateRequest;
use App\Models\ProductModel;
use App\Services\ProductModel\ProductModelCreate;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', [ProductModel::class, $request->user()]);

        return Inertia::render("ProductModels/ProductModelsIndex", [
            'productModels' => ProductModel::all(),
            'totalCount' => ProductModel::count(),
        ]);
    }

    public function create(Request $request)
    {
        $this->authorize('create', [ProductModel::class, $request->user()]);

        return Inertia::render("ProductModels/ProductModelsCreate");
    }

    public function store(ProductModelCreateRequest $request)
    {
        $this->authorize('create', [ProductModel::class, $request->user()]);

        $productModelCreateDTO = ProductModelCreateDTO::create(
            name: $request->name,
            description: $request->description
        );

        ProductModelCreate::create($productModelCreateDTO);
    }

    public function edit(ProductModel $productModel)
    {
        $this->authorize('update', [ProductModel::class, $productModel]);

        return Inertia::render("ProductModels/ProductModelEdit", [
            'productModel' => $productModel,
        ]);
    }

    public function update(CategoryUpdateRequest $request, ProductModel $productModel)
    {
        $this->authorize('update', [ProductModel::class, $productModel]);

        $categoryUpdateDTO = CategoryUpdateDTO::create(
            name: $request->name,
            description: $request->description
        );

        CategoryUpdate::update($categoryUpdateDTO, $productModel);
    }

    public function destroy(ProductModel $category)
    {
        $this->authorize('delete', [ProductModel::class, $category]);

        CategoryDelete::delete($category);
    }
}
