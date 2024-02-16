<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Libs\JsonWebToken;
use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\Guard;
use App\Models\Log;
use App\Models\PaymentMethod;
use App\Models\Permission;
use App\Models\Plan;
use App\Models\RequestType;
use App\Models\Role;
use App\Models\Status;
use App\Models\Subscription;
use App\Models\User;
use App\Models\UserRequest;
use App\Policies\CompanyPolicy;
use App\Policies\CompanyUserPolicy;
use App\Policies\LogPolicy;
use App\Policies\PaymentMethodPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\PlanPolicy;
use App\Policies\UserRequestPolicy;
use App\Policies\RequestTypePolicy;
use App\Policies\RolePolicy;
use App\Policies\StatusPolicy;
use App\Policies\SubscriptionPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Company::class => CompanyPolicy::class,
        Role::class => RolePolicy::class,
        Permission::class => PermissionPolicy::class,
        User::class => UserPolicy::class,
        Log::class => LogPolicy::class,
        Plan::class => PlanPolicy::class,
        PaymentMethod::class => PaymentMethodPolicy::class,
        Status::class => StatusPolicy::class,
        Subscription::class => SubscriptionPolicy::class,
        CompanyUser::class => CompanyUserPolicy::class,
        RequestType::class => RequestTypePolicy::class,
        UserRequest::class => UserRequestPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Auth::viaRequest(
            'jwt',
            fn (Request $request) => new Guard(
                JsonWebToken::serializeGuard(
                    JsonWebToken::credentials(
                        $request->bearerToken()
                    )
                )
            )
        );
    }
}
