<?php

namespace App\Dto\API;

use App\Http\Requests\API\LogCreateRequest;

class LogCreateDto
{
    public function __construct(
    ) {
    }

    /**
     * Serialize request
     * @param LogCreateRequest $request
     * @return LogCreateDto
     */
    public static function fromRequest(LogCreateRequest $request): LogCreateDto
    {
        return new self();
    }
}
