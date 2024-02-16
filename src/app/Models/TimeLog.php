<?php

namespace App\Models;

use App\Models\Traits\Base;
use App\Models\Traits\TimeLogTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeLog extends Model
{
    use Base, 
        HasFactory, 
        TimeLogTrait, 
        SoftDeletes;

    protected $fillable = [
        'slug',
        'user_id',
        'company_id',
        'time_in_am',
        'time_out_am',
        'time_in_pm',
        'time_out_pm',
        'otp',
        'meta'
    ];
    protected $casts = [
        'meta' => 'array'
    ];
}
