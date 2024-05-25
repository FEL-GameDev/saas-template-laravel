<?php

namespace App\Repositories\Interfaces\Role;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

interface GetRoleRepositoryInterface
{
    public function getAll(): Collection;

    public function getAllWithCount(): Collection;

    public function getByCode(string $roleCode): Role;
}
