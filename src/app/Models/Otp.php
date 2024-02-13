<?php

namespace App\Models;

use App\Models\Traits\Base;
use App\Models\Traits\OtpTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Otp extends Model
{
    use Base, HasFactory, OtpTrait, SoftDeletes;

    protected $fillable = [
        'slug',
        'user_id',
        'host',
        'otp',
        'used_at',
        'revoke_at',
    ];
    protected $hidden = [];
}
