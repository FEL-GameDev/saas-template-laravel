<?php

namespace App\Repositories\Interfaces;

use App\DTO\NewAccountDTO;
use App\Models\User;

interface NewAccountRepositoryInterface
{
    /**
     * @param NewAccountDTO $newAccountDTO
     * @return User
     */
    public function createNewAccountFromUser(NewAccountDTO $newAccountDTO): User;
}