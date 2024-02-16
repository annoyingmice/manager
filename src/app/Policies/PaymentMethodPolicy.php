<?php

namespace App\Policies;

use App\Models\PaymentMethod;
use App\Models\Guard;

class PaymentMethodPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Guard $user): bool
    {
        return $user->hasPermission(['all', 'payment_method.list']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Guard $user, PaymentMethod $paymentMethod): bool
    {
        return $user->hasPermission(['all', 'payment_method.show']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Guard $user): bool
    {
        return $user->hasPermission(['all', 'payment_method.store']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Guard $user, PaymentMethod $paymentMethod): bool
    {
        return $user->hasPermission(['all', 'payment_method.update']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Guard $user, PaymentMethod $paymentMethod): bool
    {
        return $user->hasPermission(['all', 'payment_method.delete']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Guard $user, PaymentMethod $paymentMethod): bool
    {
        return $user->hasPermission(['all', 'payment_method.restore']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Guard $user, PaymentMethod $paymentMethod): bool
    {
        return $user->hasPermission(['all', 'payment_method.forceDelete']);
    }
}
