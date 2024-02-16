<?php

namespace App\Policies;

use App\Models\CompanyUser;
use App\Models\Guard;
use Illuminate\Auth\Access\Response;

class CompanyUserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Guard $user): bool
    {
        return $user->hasPermission(['all', 'company.user.list']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Guard $user, CompanyUser $companyUser): bool
    {
        return $user->hasPermission(['all', 'company.user.show']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Guard $user): bool
    {
        return $user->hasPermission(['all', 'company.user.store']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Guard $user, CompanyUser $companyUser): bool
    {
        return $user->hasPermission(['all', 'company.user.update']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Guard $user, CompanyUser $companyUser): bool
    {
        return $user->hasPermission(['all', 'company.user.delete']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Guard $user, CompanyUser $companyUser): bool
    {
        return $user->hasPermission(['all', 'company.user.restore']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Guard $user, CompanyUser $companyUser): bool
    {
        return $user->hasPermission(['all', 'company.user.forceDelete']);
    }
}
