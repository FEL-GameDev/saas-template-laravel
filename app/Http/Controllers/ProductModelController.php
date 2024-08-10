<?php

namespace App\Http\Controllers;

use App\DTO\ProductModel\ProductModelCreateDTO;
use App\DTO\ProductModel\ProductModelUpdateDTO;
use App\Http\Requests\ProductModel\ProductModelCreateRequest;
use App\Http\Requests\ProductModel\ProductModelUpdateRequest;
use App\Models\ProductModel;
use App\Services\ProductModel\ProductModelCreate;
use App\Services\ProductModel\ProductModelDelete;
use App\Services\ProductModel\ProductModelUpdate;
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

        return Inertia::render("ProductModels/ProductModelsEdit", [
            'product' => $productModel,
        ]);
    }

    public function update(ProductModelUpdateRequest $request, ProductModel $productModel)
    {
        $this->authorize('update', [ProductModel::class, $productModel]);

        $productModelUpdateDTO = ProductModelUpdateDTO::create(
            name: $request->name,
            description: $request->description
        );

        ProductModelUpdate::update($productModelUpdateDTO, $productModel);
    }

    public function destroy(ProductModel $productModel)
    {
        $this->authorize('delete', [ProductModel::class, $productModel]);

        ProductModelDelete::delete($productModel);
    }
}
