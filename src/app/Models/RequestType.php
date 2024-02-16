<?php

namespace App\Models;

use App\Models\Traits\Base;
use App\Models\Traits\RequestTypeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestType extends Model
{
    use Base, 
        HasFactory,
        RequestTypeTrait,
        SoftDeletes;

    protected $fillable = [
        'slug',
        'name',
    ];
}
