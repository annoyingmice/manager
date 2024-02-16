<?php

namespace App\Models;

use App\Models\Traits\Base;
use App\Models\Traits\CompanyUserTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyUser extends Model
{
    use Base, HasFactory, CompanyUserTrait, SoftDeletes;

    protected $fillable = [
        'slug',
        'user_id',
        'company_id',
        'status_id',
        'employee_no',
    ];
    // Auto load related models
    protected $with = [];
}
