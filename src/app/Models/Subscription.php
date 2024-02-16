<?php

namespace App\Models;

use App\Models\Traits\Base;
use App\Models\Traits\SubscriptionTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use Base, HasFactory, SoftDeletes, SubscriptionTrait;

    protected $fillable = [
        'payment_refno',
        'slug',
        'company_id',
        'plan_id',
        'payment_method_id',
        'meta',
        'status_id',
        'expired_at',
    ];
    protected $casts = [
        'meta' => 'array',
    ];
    // Auto load related models
    protected $with = [
        'company',
        'plan',
        'paymentMethod',
        'status',
    ];
}
