<?php

namespace App\Models;

use App\Models\Traits\Base;
use App\Models\Traits\PermissionTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use Base, PermissionTrait, HasFactory, SoftDeletes;

    protected $fillable = [
        'slug',
        // @TODO naming scope.action | scope.section.action
        'name',
        'owner'
    ];
    protected $hidden = [
        'pivot'
    ];
    // Auto load related models
    protected $with = ['role'];
}
