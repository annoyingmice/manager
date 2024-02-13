<?php

namespace App\Services;

use App\Services\API\v1\CompanyTrait;

class v1 {

    use CompanyTrait;

    public function __construct()
    {
        $this->__v1InitializeCompany();
    }
    
}