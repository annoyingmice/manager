<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\Guard;
use Illuminate\Auth\Access\Response;

class RolePolicy
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
    public function view(Guard $user, Role $role): bool
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
    public function update(Guard $user, Role $role): bool
    {
        return $user->hasPermission(['all', 'role.update']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Guard $user, Role $role): bool
    {
        return $user->hasPermission(['all', 'role.delete']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Guard $user, Role $role): bool
    {
        return $user->hasPermission(['all', 'role.restore']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Guard $user, Role $role): bool
    {
        return $user->hasPermission(['all', 'role.forceDelete']);
    }

    /**
     * Determine whether the user can assign permission to the model.
     */
    public function assignPermission(Guard $user): bool
    {
        return $user->hasPermission(['all', 'user.permission.assign']);
    }
}
