<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;

class RolePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $this->manage($user);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Role $role): bool
    {

        return $this->manage($user) && $role->account->id == $user->account->id;
    }

    /**
     * Determine whether the user can manage Roles.
     */
    public function manage(User $user): bool
    {
        return $user->is_owner();
    }

    /**
     * Determine whether the user can create Roles.
     */
    public function create(User $user): bool
    {
        return $this->manage($user);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Role $role): bool
    {
        return $this->manage($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Role $role): bool
    {
        return $this->manage($user);
    }
}
