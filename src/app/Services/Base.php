<?php

namespace App\Services;

use App\Services\API\AuthTrait;
use App\Services\API\LogTrait;
use App\Services\API\PaymentMethodTrait;
use App\Services\API\PermissionTrait;
use App\Services\API\PlanTrait;
use App\Services\API\RequestTypeTrait;
use App\Services\API\RoleTrait;
use App\Services\API\UserTrait;
use App\Services\API\UserRoleTrait;
use App\Services\API\RolePermissionTrait;
use App\Services\API\StatusTrait;
use App\Services\API\SubscriptionTrait;

class Base
{
    use AuthTrait,
        RoleTrait,
        PermissionTrait,
        UserTrait,
        UserRoleTrait,
        RolePermissionTrait,
        LogTrait,
        PlanTrait,
        PaymentMethodTrait,
        StatusTrait,
        SubscriptionTrait,
        RequestTypeTrait;

    public function __construct()
    {
        $this->__initializeAuth();
        $this->__initializeRole();
        $this->__initializePermission();
        $this->__initializeUser();
        $this->__initializeUserRole();
        $this->__initializeRolePermission();
        $this->__initializeLog();
        $this->__initializePlan();
        $this->__initializePaymentMethod();
        $this->__initializeStatus();
        $this->__initializeSubscription();
        $this->__initializeRequestType();
    }
}
