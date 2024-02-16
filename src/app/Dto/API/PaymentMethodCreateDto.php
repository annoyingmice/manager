<?php

namespace App\Dto\API;

use App\Http\Requests\API\PaymentMethodCreateRequest;

class PaymentMethodCreateDto
{
    public function __construct(
        readonly string $name,
    ) {
    }

    /**
     * Serialize request
     * @param PaymentMethodCreateRequest $request
     * @return PaymentMethodCreateDto
     */
    public static function fromRequest(PaymentMethodCreateRequest $request): PaymentMethodCreateDto
    {
        return new self(
            name: $request->validated('name'),
        );
    }
}
