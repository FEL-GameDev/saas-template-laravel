<?php

namespace App\Services\Account;

use App\DTO\NewAccountDTO;
use App\DTO\User\NoAccountUserDTO;
use App\Models\User;
use App\Repositories\NewAccountRepository;
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
        $account = $createAccountRepository->create($newAccountDTO);

        $accountOwnerDTO = NoAccountUserDTO::create(
            name: $newAccountDTO->name,
            email: $newAccountDTO->email,
            password: $newAccountDTO->password,
            accountId: $account->id,
        );

        return CreateUser::createOwner($accountOwnerDTO);
    }
}
