<?php

namespace App\Dto\API;

use App\Http\Requests\API\StatusCreateRequest;

class StatusCreateDto
{
    public function __construct(
        readonly string $name
    ) {
    }

    /**
     * Serialize request
     * @param StatusCreateRequest $request
     * @return StatusCreateDto
     */
    public static function fromRequest(StatusCreateRequest $request): StatusCreateDto
    {
        return new self(
            name: $request->validated('name'),
        );
    }
}
