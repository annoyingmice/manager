<?php

namespace App\Dto\API\v1;

use App\Http\Requests\API\v1\UserRequestCreateRequest;

class UserRequestCreateDto
{
    public function __construct(
        readonly string $company_id,
        readonly string $user_id,
        readonly string $request_type_id,
        readonly string $status_id,
    ) {
    }

    /**
     * Serialize request
     * @param UserRequestCreateRequest $request
     * @return UserRequestCreateDto
     */
    public static function fromRequest(UserRequestCreateRequest $request): UserRequestCreateDto
    {
        return new self(
            company_id: $request->validated('company_id'),
            user_id: $request->validated('user_id'),
            request_type_id: $request->validated('request_type_id'),
            status_id: $request->validated('status_id'),
        );
    }
}
