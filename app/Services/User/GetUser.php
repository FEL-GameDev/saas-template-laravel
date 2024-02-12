<?php

namespace App\Services\User;

use App\Models\User;
use App\Repositories\Users\GetUserRepository;
use Illuminate\Database\Eloquent\Collection;

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
     * @param int $accountId
     * @return Collection
     */
    public static function getAll(int $accountId): Collection
    {
        $getUserRepository = new GetUserRepository();

        return $getUserRepository->getAll($accountId);
    }
}
