<?php

namespace App\Models\Traits;

use App\Models\CompanyUser;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

trait CompanyTrait
{
    public function companyUser(): HasMany
    {
        return $this->hasMany(CompanyUser::class);
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    public function users(): HasManyThrough
    {
        return $this->hasManyThrough(
            User::class,
            CompanyUser::class,
            'company_id',
            'id',
            'id',
            'user_id'
        );
    }
}
