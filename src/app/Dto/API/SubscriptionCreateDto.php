<?php

namespace App\Dto\API;

use App\Http\Requests\API\SubscriptionCreateRequest;

class SubscriptionCreateDto
{
    public function __construct(
        readonly ?string $payment_refno,
        readonly string $company_id,
        readonly string $plan_id,
        readonly string $payment_method_id,
        readonly string $status_id,
    ) {
    }

    /**
     * Serialize request
     * @param SubscriptionCreateRequest $request
     * @return SubscriptionCreateDto
     */
    public static function fromRequest(SubscriptionCreateRequest $request): SubscriptionCreateDto
    {
        return new self(
            payment_refno: $request->validated('payment_refno'),
            company_id: $request->validated('company_id'),
            plan_id: $request->validated('plan_id'),
            payment_method_id: $request->validated('payment_method_id'),
            status_id: $request->validated('status_id'),
        );
    }
}
