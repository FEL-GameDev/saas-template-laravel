<?php

namespace App\Repositories\Role;

use App\DTO\Role\CreateRoleDTO;
use App\Models\Role;

class CreateRoleRepository implements CreateRoleRepositoryInterface
{

    public function create(CreateRoleDTO $createRoleDTO): Role
    {
        return Role::create([
            'name' => $createRoleDTO->name,
            'description' => $createRoleDTO->description,
            'role_code' => $createRoleDTO->roleCode,
        ]);
    }
}
