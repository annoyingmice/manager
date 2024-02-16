<?php

namespace App\Policies;

use App\Models\UserRequest;
use App\Models\Guard;

class UserRequestPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Guard $user): bool
    {
        return $user->hasPermission(['all', 'request.list']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Guard $user, UserRequest $userRequest): bool
    {
        return $user->hasPermission(['all', 'request.show']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Guard $user): bool
    {
        return $user->hasPermission(['all', 'request.store']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Guard $user, UserRequest $userRequest): bool
    {
        return $user->hasPermission(['all', 'request.update']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Guard $user, UserRequest $userRequest): bool
    {
        return $user->hasPermission(['all', 'request.delete']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Guard $user, UserRequest $userRequest): bool
    {
        return $user->hasPermission(['all', 'request.restore']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Guard $user, UserRequest $userRequest): bool
    {
        return $user->hasPermission(['all', 'request.forceDelete']);
    }
}
