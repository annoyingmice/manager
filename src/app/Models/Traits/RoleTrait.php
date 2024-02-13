<?php

namespace App\Models\Traits;

use App\Models\Permission;
use App\Models\User;

trait RoleTrait
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }
}
