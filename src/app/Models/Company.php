<?php

namespace App\Models;

use App\Models\Traits\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\CompanyTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use Base, HasFactory, CompanyTrait, SoftDeletes;

    protected $fillable = [
        'slug',
        // @TODO
        // @FRONTEND
        // Format: Upload photo
        'avatar',
        // @TODO
        // @FRONTEND
        // Format: Upload photo
        'cover',
        'name',
        'email',
        // @TODO
        // @FRONTEND
        // Format: 000-0000
        'tel',
        // @TODO
        // @FRONTEND
        // Format: (+00)-000-000-0000 / 000-0000
        'phone',
        // @TODO
        // @FRONTEND
        // country, region, state/province, city/municipality, Str. Name, House No./ Building No.
        'address'
    ];
}
