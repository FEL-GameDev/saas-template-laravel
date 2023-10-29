<?php

namespace App\Services\UserInvite;

use App\Models\UserInvite;

class GetUserInvite
{
    public static function get(string $inviteCode): ?UserInvite
    {
        return UserInvite::where('invite_code', $inviteCode)->first();
    }
}