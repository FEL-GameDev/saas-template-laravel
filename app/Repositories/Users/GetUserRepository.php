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
     * @return Collection
     */
    public function getAll(): Collection
    {
        return User::all();
    }

    /**
     * @param string $email
     * @return User | null
     */
    public function getByEmail(string $email): User|null
    {
        return User::where('email', $email)->first();
    }
}
