<?php

namespace App\Dto\API;

use App\Http\Requests\API\RolePermissionCreateRequest;

class RolePermissionCreateDto
{
    public function __construct(
        readonly array|null $permissions,
        readonly string $role_id
    ) {
    }

    /**
     * Serialize request
     * @param RolePermissionCreateRequest $request
     * @return RolePermissionCreateDto
     */
    public static function fromRequest(RolePermissionCreateRequest $request): RolePermissionCreateDto
    {
        return new self(
            permissions: $request->validated('permissions'),
            role_id: $request->validated('role_id')
        );
    }
}
