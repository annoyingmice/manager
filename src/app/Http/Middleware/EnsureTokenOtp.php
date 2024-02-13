<?php

namespace App\Http\Middleware;

use App\Enums\ResponseMessage;
use App\Enums\ResponseType;
use App\Exceptions\HttpException;
use App\Models\Otp;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
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
        try {
            $user = auth()->user();
            $otp = Otp::where([
                ['revoke_at','=',null],
                ['otp','=',$user->otp_code],
            ])->first();

            if(is_null($otp))
            {
                throw new HttpException('Invalid otp credential used by the token.', HttpResponse::HTTP_BAD_REQUEST);
            }
            return $next($request);
        } catch(Exception $e) {
            return response()->json([
                'message' => ResponseMessage::ERROR,
                'type' => ResponseType::EXCEPTION,
                'data' => [
                    'message' => $e->getMessage()
                ],
            ], $e->getCode());
        }
    }
}
