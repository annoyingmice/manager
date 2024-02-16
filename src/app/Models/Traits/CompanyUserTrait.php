<?php

namespace App\Models\Traits;

use App\Models\Company;
use App\Models\Status;
use App\Models\User;

trait CompanyUserTrait
{
    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
