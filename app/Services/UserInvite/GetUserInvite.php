<?php

namespace App\Services\UserInvite;

use App\Models\UserInvite;
use App\Repositories\UserInvites\GetUserInviteRepository;
use Illuminate\Database\Eloquent\Collection;

class GetUserInvite
{
    public static function getById(int $userInviteId): UserInvite
    {
        $getUserInviteRepository = new GetUserInviteRepository();

        return $getUserInviteRepository->getById($userInviteId);
    }

    public static function getByInviteCode(string $inviteCode): ?UserInvite
    {
        $getUserInviteRepository = new GetUserInviteRepository();

        return $getUserInviteRepository->getByInviteCode($inviteCode);
    }

    public static function getAll(): Collection
    {
        $getUserInviteRepository = new GetUserInviteRepository();

        return $getUserInviteRepository->getAll();
    }
}
