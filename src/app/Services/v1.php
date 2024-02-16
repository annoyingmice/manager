<?php

namespace App\Services;

use App\Services\API\v1\CompanyTrait;
use App\Services\API\v1\CompanyUserTrait;
use App\Services\API\v1\TimeLogTrait;
use App\Services\API\v1\UserRequestTrait;

class v1 {

    use CompanyTrait,
        CompanyUserTrait,
        UserRequestTrait,
        TimeLogTrait;

    public function __construct()
    {
        $this->__v1InitializeCompany();
        $this->__v1InitializeCompanyUser();
        $this->__v1InitializeUserRequest();
        $this->__v1InitializeTimeLog();
    }
    
}