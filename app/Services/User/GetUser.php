<?php

namespace App\Services\User;

use App\Models\User;
use App\Repositories\GetUserRepository;

class GetUser
{
    /**
     * Get User by user_id
     *
     * @param integer $user_id
     * @return User
     */
    public static function get(int $userId): User
    {
        $getUserRepository = new GetUserRepository();

        return $getUserRepository->getById($userId);
    }
}