<?php

namespace App\Dto\API;

use App\Http\Requests\API\UserRoleCreateRequest;

class UserRoleCreateDto
{
    public function __construct(
        readonly array|null $roles,
        readonly string $user_id
    ) {
    }

    /**
     * Serialize request
     * @param UserRoleCreateRequest $request
     * @return UserRoleCreateDto
     */
    public static function fromRequest(UserRoleCreateRequest $request): UserRoleCreateDto
    {
        return new self(
            roles: $request->validated('roles'),
            user_id: $request->validated('user_id')
        );
    }
}
