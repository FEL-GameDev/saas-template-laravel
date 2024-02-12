<?php

namespace App\Repositories\Users;

use App\Models\User;
use App\Repositories\Interfaces\GetUserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetUserRepository implements GetUserRepositoryInterface
{
    public function getById(int $user_id): User
    {
        return User::where('id', $user_id)->first();
    }

    /**
     * @param int $accountId
     * @return Collection
     */
    public function getAll(int $accountId): Collection
    {
        return User::where('account_id', $accountId)->get();
    }
}
