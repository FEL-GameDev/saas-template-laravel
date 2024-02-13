<?php

namespace App\Repositories\Role;

use App\Models\Role;
use App\Repositories\Interfaces\Role\GetRoleRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetRoleRepository implements GetRoleRepositoryInterface
{

    public function getByAccountId(int $accountId): Collection
    {
        return Role::where('account_id', $accountId)->get();
    }

    public function getByAccountIdWithCount(int $accountId): Collection
    {
        return Role::where('account_id', $accountId)->withSum('users', 'id')->get();
    }


    public function getByCode(string $roleCode, int $accountId): Role
    {
        return Role::where(["role_code" => $roleCode, "account_id" => $accountId])->first();
    }
}
