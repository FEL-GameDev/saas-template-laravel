<?php

namespace App\Services\Account;

use App\Models\User;

class DeleteAccount
{
    public static function delete(User $user): void
    {
        $user->account->delete();
    }
}
