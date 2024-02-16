<?php

namespace App\Policies;

use App\Models\Subscription;
use App\Models\Guard;
use Illuminate\Auth\Access\Response;

class SubscriptionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Guard $user): bool
    {
        return $user->hasPermission(['all', 'subscription.list']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Guard $user, Subscription $subscription): bool
    {
        return $user->hasPermission(['all', 'subscription.show']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Guard $user): bool
    {
        return $user->hasPermission(['all', 'subscription.store']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Guard $user, Subscription $subscription): bool
    {
        return $user->hasPermission(['all', 'subscription.update']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Guard $user, Subscription $subscription): bool
    {
        return $user->hasPermission(['all', 'subscription.delete']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Guard $user, Subscription $subscription): bool
    {
        return $user->hasPermission(['all', 'subscription.restore']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Guard $user, Subscription $subscription): bool
    {
        return $user->hasPermission(['all', 'subscription.forceDelete']);
    }
}
