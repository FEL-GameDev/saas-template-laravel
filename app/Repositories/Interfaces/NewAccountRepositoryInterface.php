<?php

namespace App\Repositories\Interfaces;

use App\DTO\NewAccountDTO;
use App\Models\Account;

interface NewAccountRepositoryInterface
{
    /**
     * @param NewAccountDTO $newAccountDTO
     * @return Account
     */
    public function create(NewAccountDTO $newAccountDTO): Account;
}
