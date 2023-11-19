<?php

namespace App\Repositories\Interfaces;

use App\DTO\CreateUserDTO;
use App\Models\User;

interface CreateUserRepositoryInterface
{
    public function create(CreateUserDTO $createUserDTO): User;
}
