<?php

namespace App\Services;

use App\Models\User;

class DeleteAccount
{

    /**
     * Delete
     */
    public static function delete(User $user): void
    {
        $user->account()->delete();
    }
}