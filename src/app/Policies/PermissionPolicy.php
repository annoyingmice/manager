<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\Guard;
use Illuminate\Auth\Access\Response;

class PermissionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Guard $user): bool
    {
        return $user->hasPermission(['all', 'role.list']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Guard $user, Permission $permission): bool
    {
        return $user->hasPermission(['all', 'role.show']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Guard $user): bool
    {
        return $user->hasPermission(['all', 'role.store']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Guard $user, Permission $permission): bool
    {
        return $user->hasPermission(['all', 'role.update']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Guard $user, Permission $permission): bool
    {
        return $user->hasPermission(['all', 'role.delete']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Guard $user, Permission $permission): bool
    {
        return $user->hasPermission(['all', 'role.restore']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Guard $user, Permission $permission): bool
    {
        return $user->hasPermission(['all', 'role.forceDelete']);
    }
}
