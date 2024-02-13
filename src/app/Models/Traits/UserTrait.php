<?php

namespace App\Models\Traits;

use App\Models\Guard;
use App\Models\Otp;
use App\Models\Role;

trait UserTrait
{
    public function otps()
    {
        return $this->hasMany(Otp::class);
    }

    public function activeOtp()
    {
        return $this->otps()->whereNull('revoke_at')->orderBy('created_at', 'desc')->last();
    }

    public function roles()
    {
        if($this instanceof Guard) {
            return $this->belongsToMany(Role::class, 'role_user', 'user_id');
        }

        return $this->belongsToMany(Role::class);
    }

    public function hasRole(array $roles): bool
    {
        return $this->roles()->whereIn('name', $roles)->exists();
    }

    public function hasPermission(array $permissions): bool
    {
        return $this->roles()->whereHas('permissions', fn ($q) => $q->whereIn('name', $permissions))->exists();
    }
}
