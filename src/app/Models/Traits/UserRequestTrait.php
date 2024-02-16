<?php

namespace App\Models\Traits;

use App\Models\Company;
use App\Models\RequestType;
use App\Models\Status;
use App\Models\User;

trait UserRequestTrait
{
    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function requestType()
    {
        return $this->hasOne(RequestType::class, 'id', 'request_type_id');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }
}
