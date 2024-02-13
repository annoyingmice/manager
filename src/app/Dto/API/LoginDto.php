<?php

namespace App\Dto\API;

use App\Http\Requests\API\LoginRequest;

class LoginDto
{
    public function __construct(
        readonly string $phone,
    ) {
    }

    /**
     * Serialize request
     * @param LoginRequest $request
     * @return LoginDto
     */
    public static function fromRequest(LoginRequest $request): LoginDto
    {
        return new self(
            phone: $request->validated('phone'),
        );
    }
}
