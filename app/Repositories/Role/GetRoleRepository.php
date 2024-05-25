<?php

namespace App\Repositories\Role;

use App\Models\Role;
use App\Repositories\Interfaces\Role\GetRoleRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetRoleRepository implements GetRoleRepositoryInterface
{

    public function getAll(): Collection
    {
        return Role::where('account_id')->get();
    }

    public function getAllWithCount(): Collection
    {
        return Role::where('account_id')->withCount('users')->get();
    }


    public function getByCode(string $roleCode): Role
    {
        return Role::where(["role_code" => $roleCode])->first();
    }
}
