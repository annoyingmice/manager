<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Libs\JsonWebToken;
use App\Models\Company;
use App\Models\Guard;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Policies\CompanyPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::resource('companies', CompanyPolicy::class);
        Gate::resource('permissions', PermissionPolicy::class);
        Gate::resource('roles', RolePolicy::class);
        Gate::resource('users', UserPolicy::class);
        Gate::define('assign-roles', [UserPolicy::class, 'assignRole']);
        Gate::define('assign-permissions', [RolePolicy::class, 'assignPermission']);

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
