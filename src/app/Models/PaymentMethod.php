<?php

namespace App\Models;

use App\Models\Traits\Base;
use App\Models\Traits\PaymentMethodTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use Base, HasFactory, PaymentMethodTrait, SoftDeletes;

    protected $fillable = [
        'slug',
        'name',
    ];
}
