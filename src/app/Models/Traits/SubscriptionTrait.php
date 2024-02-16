<?php

namespace App\Models\Traits;

use App\Models\Company;
use App\Models\PaymentMethod;
use App\Models\Plan;
use App\Models\Status;

trait SubscriptionTrait
{

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    public function paymentMethod()
    {
        return $this->hasOne(PaymentMethod::class, 'id', 'payment_method_id');
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function plan()
    {
        return $this->hasOne(Plan::class, 'id', 'plan_id');
    }

}
