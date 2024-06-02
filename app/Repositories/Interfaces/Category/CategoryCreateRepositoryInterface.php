<?php

namespace App\Repositories\Interfaces\Category;

use App\DTO\Category\CategoryCreateDTO;
use App\Models\Category;

interface CategoryCreateRepositoryInterface
{
    public function create(CategoryCreateDTO $categoryCreateDTO): Category;
}
