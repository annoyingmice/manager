<?php

namespace App\Policies;

use App\Models\TimeLog;
use App\Models\Guard;

class TimeLogPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Guard $user): bool
    {
        return $user->hasPermission(['all', 'timeLog.list']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Guard $user, TimeLog $timeLog): bool
    {
        return $user->hasPermission(['all', 'timeLog.show']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Guard $user): bool
    {
        return true; // return $user->hasPermission(['all', 'timeLog.store']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Guard $user, TimeLog $timeLog): bool
    {
        return $user->hasPermission(['all', 'timeLog.update']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Guard $user, TimeLog $timeLog): bool
    {
        return $user->hasPermission(['all', 'timeLog.delete']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Guard $user, TimeLog $timeLog): bool
    {
        return $user->hasPermission(['all', 'timeLog.restore']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Guard $user, TimeLog $timeLog): bool
    {
        return $user->hasPermission(['all', 'timeLog.forceDelete']);
    }
}
