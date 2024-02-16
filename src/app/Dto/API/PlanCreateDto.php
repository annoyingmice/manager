<?php

namespace App\Dto\API;

use App\Http\Requests\API\PlanCreateRequest;

class PlanCreateDto
{
    public function __construct(
        readonly string $name,
        readonly string $price,
        readonly string $days,
    ) {
    }

    /**
     * Serialize request
     * @param PlanCreateRequest $request
     * @return PlanCreateDto
     */
    public static function fromRequest(PlanCreateRequest $request): PlanCreateDto
    {
        return new self(
            name: $request->validated('name'),
            price: $request->validated('price'),
            days: $request->validated('days'),
        );
    }
}
