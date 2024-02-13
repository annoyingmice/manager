<?php

namespace App\Services;

use App\Services\API\AuthTrait;
use App\Services\API\PermissionTrait;
use App\Services\API\RoleTrait;
use App\Services\API\UserTrait;
use App\Services\API\UserRoleTrait;
use App\Services\API\RolePermissionTrait;
use App\Services\API\v1\CompanyTrait;

class v1 {

    use AuthTrait,
        RoleTrait,
        PermissionTrait,
        UserTrait,
        UserRoleTrait,
        RolePermissionTrait,
        CompanyTrait;

    public function __construct()
    {
        $this->__initializeAuth();
        $this->__initializeRole();
        $this->__initializePermission();
        $this->__initializeUser();
        $this->__initializeUserRole();
        $this->__initializeRolePermission();
        $this->__v1InitializeCompany();
    }
    
}