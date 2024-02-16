<?php

namespace App\Policies;

use App\Models\RequestType;
use App\Models\Guard;
use Illuminate\Auth\Access\Response;

class RequestTypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Guard $user): bool
    {
        return $user->hasPermission(['all', 'requestType.list']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Guard $user, RequestType $requestType): bool
    {
        return $user->hasPermission(['all', 'requestType.show']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Guard $user): bool
    {
        return $user->hasPermission(['all', 'requestType.store']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Guard $user, RequestType $requestType): bool
    {
        return $user->hasPermission(['all', 'requestType.update']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Guard $user, RequestType $requestType): bool
    {
        return $user->hasPermission(['all', 'requestType.delete']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Guard $user, RequestType $requestType): bool
    {
        return $user->hasPermission(['all', 'requestType.restore']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Guard $user, RequestType $requestType): bool
    {
        return $user->hasPermission(['all', 'requestType.forceDelete']);
    }
}
