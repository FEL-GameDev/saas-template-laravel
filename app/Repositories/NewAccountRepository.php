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
        return Account::create([
            'name' => $newAccountDTO->accountName,
        ]);
    }
}
