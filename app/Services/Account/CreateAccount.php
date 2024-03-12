<?php

namespace App\Services\Account;

use App\DTO\CreateUserDTO;
use App\DTO\NewAccountDTO;
use App\DTO\Role\CreateRoleDTO;
use App\Models\User;
use App\Repositories\NewAccountRepository;
use App\Services\Role\CreateRole;
use App\Services\User\CreateUser;

class CreateAccount
{
    /**
     * Register a new account from a signup flow
     *
     * @param NewAccountDTO $newAccountDTO
     * @return User
     */
    public static function register(NewAccountDTO $newAccountDTO): User
    {
        $createAccountRepository = new NewAccountRepository();
        $account = $createAccountRepository->createNewAccountFromUser($newAccountDTO);

        $adminRoleDTO = CreateRoleDTO::create(
            accountId: $account->id,
            roleCode: 'admin',
            name: "Admin",
            description: "Admin role for the account"
        );
        $adminRole = CreateRole::create($adminRoleDTO);

        $createUserDTO = CreateUserDTO::create(
            name: $newAccountDTO->name,
            email: $newAccountDTO->email,
            password: $newAccountDTO->password,
            accountId: $account->id,
            isOwner: true,
            roleId: $adminRole->id
        );

        return CreateUser::create($createUserDTO);
    }
}
