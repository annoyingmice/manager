<?php

namespace App\Dto\API;

use App\Http\Requests\API\RequestTypeCreateRequest;

class RequestTypeCreateDto
{
    public function __construct(
        readonly string $name,
    ) {
    }

    /**
     * Serialize request
     * @param RequestTypeCreateRequest $request
     * @return RequestTypeCreateDto
     */
    public static function fromRequest(RequestTypeCreateRequest $request): RequestTypeCreateDto
    {
        return new self(
            name: $request->validated('name'),
        );
    }
}
