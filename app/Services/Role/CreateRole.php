<?php

namespace App\Services\Role;

use App\DTO\Role\CreateRoleDTO;
use App\Models\Role;
use App\Repositories\Role\CreateRoleRepository;

class CreateRole
{
    public static function create(CreateRoleDTO $createRoleDTO): Role
    {
        $createRoleRepository = new CreateRoleRepository();

        return $createRoleRepository->create($createRoleDTO);
    }
}
