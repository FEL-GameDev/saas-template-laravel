<?php

namespace App\Repositories\Interfaces\ProductModel;

use App\DTO\ProductModel\ProductModelCreateDTO;
use App\Models\ProductModel;

interface ProductModelCreateRepositoryInterface
{
    public function create(ProductModelCreateDTO $productModelCreateDTO): ProductModel;
}
