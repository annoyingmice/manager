<?php

namespace App\Policies;

use App\Models\Plan;
use App\Models\Guard;
use Illuminate\Auth\Access\Response;

class PlanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Guard $user): bool
    {
        return $user->hasPermission(['all', 'plan.list']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Guard $user, Plan $plan): bool
    {
        return $user->hasPermission(['all', 'plan.view']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Guard $user): bool
    {
        return $user->hasPermission(['all', 'plan.store']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Guard $user, Plan $plan): bool
    {
        return $user->hasPermission(['all', 'plan.update']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Guard $user, Plan $plan): bool
    {
        return $user->hasPermission(['all', 'plan.delete']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Guard $user, Plan $plan): bool
    {
        return $user->hasPermission(['all', 'plan.restore']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Guard $user, Plan $plan): bool
    {
        return $user->hasPermission(['all', 'plan.forceDelete']);
    }
}
