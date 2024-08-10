<?php

namespace App\Repositories;

use App\DTO\NewAccountDTO;
use App\Models\Account;
use App\Repositories\Interfaces\NewAccountRepositoryInterface;

class NewAccountRepository implements NewAccountRepositoryInterface
{

    public function create(NewAccountDTO $newAccountDTO): Account
    {
        return Account::create([
            'name' => $newAccountDTO->accountName,
        ]);
    }
}
