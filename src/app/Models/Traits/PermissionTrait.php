<?php

namespace App\Models\Traits;

use App\Models\Role;

trait PermissionTrait
{
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_permission');
    }    
}
