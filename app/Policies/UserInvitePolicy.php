<?php

namespace App\Policies;

use App\Models\User;

class UserInvitePolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->is_owner;
    }
}
