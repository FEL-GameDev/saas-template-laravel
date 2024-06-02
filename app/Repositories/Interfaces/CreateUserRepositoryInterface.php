<?php

namespace App\Repositories\Interfaces;

use App\DTO\CreateUserDTO;
use App\DTO\User\AccountOwnerDTO;
use App\Models\User;

interface CreateUserRepositoryInterface
{
    public function create(CreateUserDTO $createUserDTO): User;

    public function createOwner(AccountOwnerDTO $accountOwnerDTO): User;
}
