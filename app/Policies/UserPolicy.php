<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewList(User $user)
    {
        return $user->is_owner;
    }

    public function invite(User $user)
    {
        return $user->is_owner;
    }

    public function edit(User $user)
    {
        return $user->is_owner;
    }
}
