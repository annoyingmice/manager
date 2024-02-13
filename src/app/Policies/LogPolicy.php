<?php

namespace App\Policies;

use App\Models\Log;
use App\Models\Guard;
use Illuminate\Auth\Access\Response;

class LogPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Guard $user): bool
    {
        return $user->hasPermission(['all', 'log.list']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Guard $user, Log $log): bool
    {
        return $user->hasPermission(['all', 'log.show']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Guard $user): bool
    {
        return $user->hasPermission(['all', 'log.store']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Guard $user, Log $log): bool
    {
        return $user->hasPermission(['all', 'log.update']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Guard $user, Log $log): bool
    {
        return $user->hasPermission(['all', 'log.delete']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Guard $user, Log $log): bool
    {
        return $user->hasPermission(['all', 'log.restore']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Guard $user, Log $log): bool
    {
        return $user->hasPermission(['all', 'log.forceDelete']);
    }
}
