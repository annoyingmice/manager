<?php

namespace App\Models\Traits;

use App\Libs\Otp;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Ramsey\Uuid\Uuid;

trait Base {

    /**
     * Used to autofil slug field for models
     */
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function($m) {
            $m->slug = Uuid::uuid4();
            if($m instanceof User) {
                $m->otp_secret = (new otp)->createSecretKey();
            }
        });
    }

    /**
     * Retrieve a model instance by the slug column.
     *
     * @param string $slug
     * @return static|null
     */
    public static function findBySlug($slug)
    {
        $m = static::where('slug', $slug)->first();
        if(!$m) throw new ModelNotFoundException(class_basename(new self));
        return $m;
    }

    /**
     * Custom route model binding query
     * @param string $value
     * @param mixed $field
     * @return mixed
     */
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->findBySlug($value);
    }

}