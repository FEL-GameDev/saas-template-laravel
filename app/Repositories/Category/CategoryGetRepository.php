<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Interfaces\Category\CategoryGetRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CategoryGetRepository implements CategoryGetRepositoryInterface
{

    public function getAll(): Collection
    {
        return Category::all();
    }

    public function getAllWithCount(): Collection
    {
        return Category::withCount('subCategories')->get();
    }
}
