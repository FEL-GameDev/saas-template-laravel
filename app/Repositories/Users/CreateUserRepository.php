<?php

namespace App\Repositories\Users;

use App\DTO\CreateUserDTO;
use App\DTO\User\NoAccountUserDTO;
use App\Models\User;
use App\Repositories\Interfaces\CreateUserRepositoryInterface;

class CreateUserRepository implements CreateUserRepositoryInterface
{
    public function create(CreateUserDTO $createUserDTO): User
    {
        return User::create([
            "email" => $createUserDTO->email,
            "password" => $createUserDTO->password,
            "name" => $createUserDTO->name,
            "is_owner" => $createUserDTO->is_owner
        ]);
    }

    public function createForAccount(NoAccountUserDTO $accountOwnerDTO, bool $isOwner): User
    {
        return User::create([
            "email" => $accountOwnerDTO->email,
            "password" => $accountOwnerDTO->password,
            "name" => $accountOwnerDTO->name,
            "account_id" => $accountOwnerDTO->accountId,
            "is_owner" => $isOwner,
        ]);
    }
}
