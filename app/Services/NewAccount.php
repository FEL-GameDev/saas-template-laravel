<?php

namespace App\Services;

use App\DTO\NewAccountDTO;
use App\Repositories\NewAccountRepository;
use App\Repositories\Interfaces\NewAccountRepositoryInterface;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class NewAccount
{
    private NewAccountRepositoryInterface $createAccountRepository;

    /**
     * Register a new account from a signup flow
     *
     * @param NewAccountDTO $newAccountDTO
     * @return User
     */
    public static function register(NewAccountDTO $newAccountDTO): User
    {
        $createAccountRepository = new NewAccountRepository();
        return $createAccountRepository->createNewAccountFromUser($newAccountDTO);
    }
}