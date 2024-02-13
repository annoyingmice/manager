<?php

namespace App\Policies;

use App\Models\Guard;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Guard $user): bool
    {
        return $user->hasPermission(['all', 'user.list']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Guard $user, User $model): bool
    {
        return $user->hasPermission(['all', 'user.show']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Guard $user): bool
    {
        return $user->hasPermission(['all', 'user.store']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Guard $user, User $model): bool
    {
        return $user->hasPermission(['all', 'user.update']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Guard $user, User $model): bool
    {
        return $user->hasPermission(['all', 'user.delete']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Guard $user, User $model): bool
    {
        return $user->hasPermission(['all', 'user.restore']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Guard $user, User $model): bool
    {
        return $user->hasPermission(['all', 'user.forceDelete']);
    }

    /**
     * Determine whether the user can assign role to the model.
     */
    public function assignRole(Guard $user): bool
    {
        return $user->hasPermission(['all', 'user.role.assign']);
    }
}
