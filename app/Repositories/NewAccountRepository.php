<?php

namespace App\Repositories;

use App\DTO\NewAccountDTO;
use App\Models\Account;
use App\Models\User;
use App\Repositories\Interfaces\NewAccountRepositoryInterface;

class NewAccountRepository implements NewAccountRepositoryInterface
{

    public function createNewAccountFromUser(NewAccountDTO $newAccountDTO): User
    {
        $account = Account::create([
            'name' => $newAccountDTO->account_name,
        ]);

        return $account->users()->create([
            "email" => $newAccountDTO->email,
            "password" => $newAccountDTO->password,
            "name" => $newAccountDTO->name,
            "is_owner" => true,
        ]);
    }
}
