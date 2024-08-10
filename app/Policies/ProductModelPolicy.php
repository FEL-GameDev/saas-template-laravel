<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\ProductModel;
use App\Models\User;

class ProductModelPolicy
{
    public function manageProductModels(User $user): bool
    {
        return $user->is_owner();
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $this->manageProductModels($user);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ProductModel $productModel): bool
    {
        return $this->manageProductModels($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $this->manageProductModels($user);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ProductModel $productModel): bool
    {
        return $this->manageProductModels($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ProductModel $productModel): bool
    {
        return $this->manageProductModels($user);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ProductModel $productModel): bool
    {
        return $this->manageProductModels($user);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ProductModel $productModel): bool
    {
        return $this->manageProductModels($user);
    }
}
