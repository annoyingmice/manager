<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\Guard;
use Illuminate\Auth\Access\Response;

class CompanyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Guard $user): bool
    {
        return $user->hasPermission(['all', 'company.list']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Guard $user, Company $company): bool
    {
        return $user->hasPermission(['all', 'company.show']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Guard $user): bool
    {
        return $user->hasPermission(['all', 'company.store']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Guard $user, Company $company): bool
    {
        return $user->hasPermission(['all', 'company.update']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Guard $user, Company $company): bool
    {
        return $user->hasPermission(['all', 'company.delete']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Guard $user, Company $company): bool
    {
        return $user->hasPermission(['all', 'company.store']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Guard $user, Company $company): bool
    {
        return $user->hasPermission(['all', 'company.forceDelete']);
    }
}
