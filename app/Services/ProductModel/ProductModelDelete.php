<?php

namespace App\Services\ProductModel;

use App\Models\ProductModel;

class ProductModelDelete
{
    public static function delete(ProductModel $productModel): bool
    {
        return $productModel->delete();
    }
}
