<?php

namespace App\Repositories\Users;

use App\Models\User;
use App\Repositories\Interfaces\GetUserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetUserRepository implements GetUserRepositoryInterface
{
    public function getById(int $userId): User
    {
        return User::where('id', $userId)->first();
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
