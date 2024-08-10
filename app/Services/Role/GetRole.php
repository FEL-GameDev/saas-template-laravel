<?php

namespace App\Services\Role;

use App\Models\Role;
use App\Repositories\Role\GetRoleRepository;
use Illuminate\Database\Eloquent\Collection;

class GetRole
{
    public static function getAll(): Collection
    {
        $getRoleRepository = new GetRoleRepository();

        return $getRoleRepository->getAll();
    }

    public static function getAllWithCount(): Collection
    {
        $getRoleRepository = new GetRoleRepository();

        return $getRoleRepository->getAllWithCount();
    }

    public static function getByCode(string $roleCode): Role
    {
        $getRoleRepository = new GetRoleRepository();

        return $getRoleRepository->getByCode($roleCode);
    }
}
