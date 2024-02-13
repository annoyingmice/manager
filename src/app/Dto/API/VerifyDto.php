<?php

namespace App\Dto\API;

use App\Http\Requests\API\VerifyRequest;

class VerifyDto
{
    public function __construct(
        readonly string $otp,
    ) {
    }

    /**
     * Serialize request
     * @param LoginRequest $request
     * @return VerifyDto
     */
    public static function fromRequest(VerifyRequest $request): VerifyDto
    {
        return new self(
            otp: $request->validated('otp'),
        );
    }
}
