<?php

namespace App\Http\Middleware;

use App\Enums\ResponseMessage;
use App\Enums\ResponseType;
use App\Exceptions\HttpException;
use App\Models\Otp;
use Closure;
use Error;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenOtp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // @TODO update this in future
        $user = request()->user();
        // $otp = Otp::where([
        //     ['revoke_at','=',null],
        //     ['otp','=',$user->otp_code],
        // ])->first();

        if(false)
        {
            throw new Error('Invalid otp credential used by the token.');
        }
        return $next($request);
    }
}
