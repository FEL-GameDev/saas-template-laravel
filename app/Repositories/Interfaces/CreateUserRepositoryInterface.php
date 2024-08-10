<?php

namespace App\Repositories\Interfaces;

use App\DTO\CreateUserDTO;
use App\DTO\User\NoAccountUserDTO;
use App\Models\User;

interface CreateUserRepositoryInterface
{
    public function create(CreateUserDTO $createUserDTO): User;

    public function createForAccount(NoAccountUserDTO $accountOwnerDTO, bool $isOwner): User;
}
