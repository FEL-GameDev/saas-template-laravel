<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Interfaces\Category\CategoryGetRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CategoryGetRepository implements CategoryGetRepositoryInterface
{

    public function getByAccountId(int $accountId): Collection
    {
        return Category::where('account_id', $accountId)->get();
    }
}
