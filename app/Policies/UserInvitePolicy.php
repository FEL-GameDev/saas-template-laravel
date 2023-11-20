<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\UserInvite;
use App\Models\User;

class UserInvitePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, UserInvite $userInvite): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->is_owner;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, UserInvite $userInvite): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, UserInvite $userInvite): bool
    {
        return $userInvite->account_id == $user->account_id && $this->create($user);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, UserInvite $userInvite): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, UserInvite $userInvite): bool
    {
        //
    }
}