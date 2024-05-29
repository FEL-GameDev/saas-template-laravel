<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Repositories\Category\CategoryGetRepository;
use Illuminate\Support\Collection;

class CategoryGet
{

    public static function getAll(): Collection {
        $categoryGetRepository = new CategoryGetRepository();

        return $categoryGetRepository->getAll();
    }

    public static function getById(int $id): Category {
        $categoryGetRepository = new CategoryGetRepository();

        return $categoryGetRepository->getById($id);
    }
}
