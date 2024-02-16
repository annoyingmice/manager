<?php

namespace App\Policies;

use App\Models\Status;
use App\Models\Guard;
use Illuminate\Auth\Access\Response;

class StatusPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Guard $user): bool
    {
        return $user->hasPermission(['all', 'status.list']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Guard $user, Status $status): bool
    {
        return $user->hasPermission(['all', 'status.show']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Guard $user): bool
    {
        return $user->hasPermission(['all', 'status.store']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Guard $user, Status $status): bool
    {
        return $user->hasPermission(['all', 'status.update']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Guard $user, Status $status): bool
    {
        return $user->hasPermission(['all', 'status.delete']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Guard $user, Status $status): bool
    {
        return $user->hasPermission(['all', 'status.restore']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Guard $user, Status $status): bool
    {
        return $user->hasPermission(['all', 'status.forceDelete']);
    }
}
