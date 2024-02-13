<?php

namespace App\Services\Role;

use App\Models\Role;
use App\Repositories\Role\GetRoleRepository;
use Illuminate\Database\Eloquent\Collection;

class GetRole
{
    public static function getAll(int $accountId): Collection
    {
        $getRoleRepository = new GetRoleRepository();

        return $getRoleRepository->getByAccountId($accountId);
    }

    public static function getAllWithCount(int $accountId): Collection
    {
        $getRoleRepository = new GetRoleRepository();

        return $getRoleRepository->getByAccountIdWithCount($accountId);
    }

    public static function getByCode(string $roleCode, int $accountId): Role
    {
        $getRoleRepository = new GetRoleRepository();

        return $getRoleRepository->getByCode($roleCode, $accountId);
    }
}
