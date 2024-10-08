<?php

namespace App\Services\User;

use App\DTO\CreateUserDTO;
use App\DTO\User\NoAccountUserDTO;
use App\Models\User;
use App\Repositories\Users\CreateUserRepository;

class CreateUser
{
    /**
     * Create a new user
     *
     * @param CreateUserDTO $createUserDTO
     * @return User
     */
    public static function create(CreateUserDTO $createUserDTO): User
    {
        $createUserRepository = new CreateUserRepository();

        return $createUserRepository->create($createUserDTO);
    }

    public static function createOwner(NoAccountUserDTO $accountOwnerDTO): User
    {
        $createUserRepository = new CreateUserRepository();

        return $createUserRepository->createForAccount($accountOwnerDTO, true);
    }

    public static function createInvitedUser(NoAccountUserDTO $createInvitedUserDTO): User
    {
        $createUserRepository = new CreateUserRepository();

        return $createUserRepository->createForAccount($createInvitedUserDTO, false);
    }
}
