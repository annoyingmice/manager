<?php

namespace App\Models\Traits;

use App\Models\User;

trait LogTrait
{
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
