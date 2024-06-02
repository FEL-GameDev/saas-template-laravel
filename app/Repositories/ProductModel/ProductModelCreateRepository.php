<?php

namespace App\Repositories\ProductModel;

use App\DTO\ProductModel\ProductModelCreateDTO;
use App\Models\ProductModel;
use App\Repositories\Interfaces\ProductModel\ProductModelCreateRepositoryInterface;

class ProductModelCreateRepository implements ProductModelCreateRepositoryInterface
{

    public function create(ProductModelCreateDTO $productModelCreateDTO): ProductModel
    {
        return ProductModel::create([
            'name' => $productModelCreateDTO->name,
            'description' => $productModelCreateDTO->description,
        ]);
    }
}
