<?php

namespace App\Repositories;

use App\DTO\NewAccountDTO;
use App\Models\Account;
use App\Models\User;
use App\Repositories\Interfaces\NewAccountRepositoryInterface;

class NewAccountRepository implements NewAccountRepositoryInterface
{
    /**
     * Summary of createNewAccountFromUser
     * @param \App\DTO\NewAccountDTO $newAccountDTO
     * @return \App\Models\User
     */
    public function createNewAccountFromUser(NewAccountDTO $newAccountDTO): User
    {
        $account = Account::create();

        return $account->users()->create([
            "email" => $newAccountDTO->email,
            "password" => $newAccountDTO->password,
            "name" => $newAccountDTO->name,
        ]);
    }
}