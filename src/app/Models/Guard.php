<?php

namespace App\Models;

use App\Models\Traits\Base;
use App\Models\Traits\UserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guard extends Authenticatable
{
    use UserTrait;

    protected $table = 'users';
    /**
     * @NOTE
     * -------------------------------------
     *  This model is only used in JWT Guard
     * -------------------------------------
     */
    protected $fillable = [
        'iss',
        'aud',
        'iat',
        'exp',
        'id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone',
        'address',
        'otp_code',
    ];
}
