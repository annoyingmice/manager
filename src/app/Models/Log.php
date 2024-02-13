<?php

namespace App\Models;

use App\Models\Traits\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use Base, HasFactory, SoftDeletes;

    protected $fillable = [
        'slug',
        'ip',
        'user_id',
        'meta',
        'action',
        'path',
        'roles',
        'permissions',
        'class',
    ];

    protected $casts = [
        'meta' => 'array',
    ];
}
