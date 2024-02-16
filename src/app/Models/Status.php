<?php

namespace App\Models;

use App\Models\Traits\Base;
use App\Models\Traits\StatusTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use Base, HasFactory, StatusTrait, SoftDeletes;

    protected $fillable = [
        'slug',
        'name'
    ];
}
