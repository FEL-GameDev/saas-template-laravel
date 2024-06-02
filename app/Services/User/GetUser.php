<?php

namespace App\Services\User;

use App\Models\User;
use App\Repositories\Users\GetUserRepository;
use Illuminate\Support\Collection;

class GetUser
{
    /**
     * Get User by user_id
     *
     * @param integer $userId
     * @return User
     */
    public static function get(int $userId): User
    {
        $getUserRepository = new GetUserRepository();

        return $getUserRepository->getById($userId);
    }

    /**
     * @return Collection
     */
    public static function getAll(): Collection
    {
        $getUserRepository = new GetUserRepository();

        $users = $getUserRepository->getAll();

        return $users->map(function ($user) {
            return [
                "id" => $user->id,
                "name" => $user->name,
                "email" => $user->email,
                "role_name" => $user->role->name,
                "edit_url" => route('users.edit', $user),
            ];
        });
    }

    /**
     * @param string $email
     * @return User|null
     */
    public static function getByEmail(string $email): User|null
    {
        $getUserRepository = new GetUserRepository();

        return $getUserRepository->getByEmail($email);
    }
}
