<?php

namespace App\Http\Middleware;

use Closure;
use Error;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Subscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(
            !is_null(
                request()->user()->company
            ) 
            && now()->greaterThan(request()->user()->company->subscription->expires_at)
            || !request()->user()->company->subscription->status_id === 2
        )
        {
            throw new Error('Subscription is expired.');
        }
        return $next($request);
    }
}
