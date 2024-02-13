<?php

namespace App\Repositories\UserInvites;

use App\Models\UserInvite;
use App\Repositories\Interfaces\UserInvites\GetUserInviteInterface;
use Illuminate\Database\Eloquent\Collection;

class GetUserInviteRepository implements GetUserInviteInterface
{

    public function getById(int $userInviteId): UserInvite
    {
        return UserInvite::where('id', $userInviteId)->first();
    }

    public function getByInviteCode(string $inviteCode): UserInvite
    {
        return UserInvite::where('invite_code', $inviteCode)->first();
    }

    public function getAllByAccountId(int $accountId): Collection
    {
        return UserInvite::where('account_id', $accountId)->get();
    }
}
