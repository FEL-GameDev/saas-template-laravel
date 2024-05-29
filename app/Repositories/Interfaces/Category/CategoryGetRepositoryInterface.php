<?php

namespace App\Repositories\Interfaces\Category;

use Illuminate\Database\Eloquent\Collection;

interface CategoryGetRepositoryInterface
{
    public function getAll(): Collection;

    public function getById(int $id);
}
