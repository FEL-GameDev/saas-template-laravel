<?php

namespace App\Services\ProductModel;

use App\DTO\ProductModel\ProductModelUpdateDTO;
use App\Models\ProductModel;

class ProductModelUpdate
{
    public static function update(ProductModelUpdateDTO $productModelUpdateDTO, ProductModel $productModel): ProductModel
    {
        $productModel->update(
            [
                'name' => $productModelUpdateDTO->name,
                'description' => $productModelUpdateDTO->description,
            ]
        );

        return $productModel;
    }
}
