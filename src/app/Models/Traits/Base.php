<?php

namespace App\Models\Traits;

use App\Libs\Otp;
use App\Models\Company;
use App\Models\Log;
use App\Models\Plan;
use App\Models\Subscription;
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
            if(
                ($m instanceof User)
                || ($m instanceof Company)
            ) {
                $m->otp_secret = (new Otp)->createSecretKey();
            }
            if($m instanceof Subscription) {
                $m->expires_at = (new static)->planExpiry();
            }
        });
        static::updating(function($m) {
            if($m instanceof Subscription && $m->status_id == 5) { // Only run on changing status from pending to active
                $m->expires_at = (new static)->planExpiry();
            }
        });
        static::retrieved(function($m) {
            static $hasLogged = false;
            if(!$hasLogged) {
                (new static)->log($m);
                $hasLogged = true;
            }
        });
        static::created(fn ($m) => (new self)->log($m));
        static::updated(fn ($m) => (new self)->log($m));
        static::deleted(fn ($m) => (new self)->log($m));
        static::forceDeleted(fn ($m) => (new self)->log($m));
        static::restored(fn ($m) => (new self)->log($m));
    }

    /**
     * Retrieve a model instance by the slug column.
     *
     * @param string $slug
     * @return static|null
     */
    public static function findBySlug($slug): mixed
    {
        $m = static::where('slug', $slug)->first();
        if(!$m) throw new ModelNotFoundException(class_basename(new self)." not found.");
        return $m;
    }

    /**
     * Custom route model binding query
     * @param string $value
     * @param mixed $field
     * @return mixed
     */
    public function resolveRouteBinding($value, $field = null): mixed
    {
        return $this->findBySlug($value);
    }

    private function log(self $m): void
    {
        $log = [
            'ip' => request()->ip(),
            'user_id' => is_null(request()->user()) ? null : request()->user()->id,
            'meta' => json_encode($m->toArray()),
            'action' => request()->method(),
            'path' => request()->path(),
            'roles' => is_null(auth()->user()) 
                ? null 
                : implode(',', collect(request()->user()->roles)->map(fn ($i) => $i->name)->toArray()),
            // Get all roles flatMap get all permissions and put in single collection
            'permissions' => is_null(request()->user()) 
                ? null 
                : implode(',', collect(request()->user()->roles)->flatMap(fn ($i) => collect($i->permissions)->pluck('name'))->toArray()),
            'class' => self::class,
        ];

        if(!new self instanceof Log)
        {
            Log::create($log);
        }
    }

    private function planExpiry()
    {
        return now()->addDays(
            Plan::find(
                request()->get('plan_id')
            )->days
        );
    }

}