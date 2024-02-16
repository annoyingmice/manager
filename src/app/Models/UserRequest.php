<?php

namespace App\Models;

use App\Models\Traits\Base;
use App\Models\Traits\UserRequestTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRequest extends Model
{
    use Base, 
        HasFactory, 
        UserRequestTrait,
        SoftDeletes;

    protected $fillable = [
        'slug',
        'company_id',
        'user_id',
        'request_type_id',
        'status_id',
        'meta',
    ];
    protected $casts = [];
    protected $with = [
        'company',
        'user',
        'requestType',
        'status',
    ];
}
