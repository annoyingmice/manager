<?php

namespace App\Dto\API;

use App\Http\Requests\API\RoleCreateRequest;

class RoleCreateDto
{
    public function __construct(
        readonly string $name,
        readonly ?string $owner,
    ) {
    }

    /**
     * Serialize request
     * @param RoleCreateRequest $request
     * @return RoleCreateDto
     */
    public static function fromRequest(RoleCreateRequest $request): RoleCreateDto
    {
        return new self(
            name: $request->validated('name'),
            owner: $request->validated('owner'),
        );
    }
}
