<?php

namespace App\Models;

use App\Models\Traits\Base;
use App\Models\Traits\PlanTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use Base, HasFactory, PlanTrait, SoftDeletes;

    protected $fillable = [
        'slug',
        'name',
        'price',
        'days',
    ];
}
