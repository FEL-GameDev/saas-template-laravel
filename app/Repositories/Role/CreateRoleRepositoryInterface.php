<?php

namespace App\Repositories\Role;

use App\DTO\Role\CreateRoleDTO;
use App\Models\Role;

interface CreateRoleRepositoryInterface
{
    public function create(CreateRoleDTO $createRoleDTO): Role;
}
