<?php

namespace App\Repositories\Interfaces\Category;

use Illuminate\Database\Eloquent\Collection;

interface CategoryGetRepositoryInterface
{
    public function getByAccountId(int $accountId): Collection;
}
