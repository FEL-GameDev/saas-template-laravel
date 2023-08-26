<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewList(User $user)
    {
        return $user->is_owner;
    }
}