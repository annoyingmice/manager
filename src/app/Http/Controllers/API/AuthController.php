<?php

namespace App\Http\Controllers\API;

use App\Dto\API\LoginDto;
use App\Dto\API\VerifyDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginRequest;
use App\Http\Requests\API\VerifyRequest;
use App\Services\Base;
use App\Http\Resources\API\GenericResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthController extends Controller
{
    private $service;

    public function __construct(Base $authService)
    {
        $this->service = $authService;
    }

    /**
     * Handle find login account
     * @param LoginRequest $request
     * @return JsonResource|JsonResponse
     */
    public function login(LoginRequest $request): JsonResource|JsonResponse
    {
        return new GenericResource(
            $this->service->login(
                LoginDto::fromRequest($request),
            ),
        );
    }

    /**
     * Handle verify user
     * @param VerifyRequest $request
     * @return JsonResource|JsonResponse
     */
    public function verify(VerifyRequest $request): JsonResource|JsonResponse
    {
        return new GenericResource(
            $this->service->verify(
                VerifyDto::fromRequest($request),
            ),
        );
    }

    /**
     * Handle logout user
     * @return JsonResource|JsonResponse
     */
    public function logout(): JsonResource|JsonResponse
    {
        return new GenericResource(
            $this->service->logout(),
        );
    }
}
