<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\GetUserRepositoryInterface;

class GetUserRepository implements GetUserRepositoryInterface
{
    public function getById(int $user_id): User
    {
        return User::where('id', $user_id)->first();
    }
}