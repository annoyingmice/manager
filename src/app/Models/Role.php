<?php

namespace App\Models;

use App\Models\Traits\Base;
use App\Models\Traits\RoleTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use Base, RoleTrait, HasFactory, SoftDeletes;

    protected $fillable = [
        'slug',
        'name',
        'owner'
    ];

    protected $hidden = [
        'pivot'
    ];
}
