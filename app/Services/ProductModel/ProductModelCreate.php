<?php

namespace App\Services\ProductModel;

use App\DTO\ProductModel\ProductModelCreateDTO;
use App\Models\ProductModel;
use App\Repositories\ProductModel\ProductModelCreateRepository;

class ProductModelCreate
{
    public static function create(ProductModelCreateDTO $productModelCreateDTO): ProductModel
    {
        $productModelCreateRepository = new ProductModelCreateRepository();

        return $productModelCreateRepository->create($productModelCreateDTO);
    }
}
