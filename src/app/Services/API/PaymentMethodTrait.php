<?php

namespace App\Services\API;

use App\Dto\API\PaymentMethodCreateDto;
use App\Models\PaymentMethod;

trait PaymentMethodTrait
{

    public function __initializePaymentMethod()
    {
    }

    /**
     * List new payment methods
     * @return mixed
     */
    public function paymentMethods(?int $limit = 20): mixed
    {
        $paymentMethods = PaymentMethod::paginate($limit);
        return $paymentMethods;
    }

    /**
     * Create new payment method
     * @param PaymentMethodCreateDto $dto
     * @return PaymentMethod
     */
    public function paymentMethodCreate(PaymentMethodCreateDto $dto): PaymentMethod
    {
        $paymentMethod = new PaymentMethod();
        $paymentMethod->name = $dto->name;
        $paymentMethod->save();
        return $paymentMethod;
    }

    /**
     * Update new payment method
     * @param PaymentMethodCreateDto $dto
     * @param PaymentMethod $plan
     * @return PaymentMethod
     */
    public function paymentMethodUpdate(PaymentMethodCreateDto $dto, PaymentMethod $paymentMethod): PaymentMethod
    {
        $paymentMethod->name = $dto->name;
        $paymentMethod->save();
        return $paymentMethod;
    }

    /**
     * Show new payment method
     * @param PaymentMethod $paymentMethod
     * @return PaymentMethod
     */
    public function paymentMethodShow(PaymentMethod $paymentMethod): PaymentMethod
    {
        return $paymentMethod;
    }

    /**
     * Show new payment method
     * @param PaymentMethod $paymentMethod
     * @return PaymentMethod
     */
    public function paymentMethodDelete(PaymentMethod $paymentMethod): PaymentMethod
    {
        $paymentMethod->delete();
        return $paymentMethod;
    }
}
