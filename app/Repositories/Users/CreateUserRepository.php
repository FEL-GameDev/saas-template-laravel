<?php

namespace App\Repositories\Users;

use App\DTO\CreateUserDTO;
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
            "account_id" => $createUserDTO->accountId,
            "is_owner" => $createUserDTO->isOwner,
            "role_id" => $createUserDTO->roleId,
        ]);
    }
}
