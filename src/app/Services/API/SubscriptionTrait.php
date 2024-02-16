<?php

namespace App\Services\API;

use App\Dto\API\SubscriptionCreateDto;
use App\Models\Subscription;

trait SubscriptionTrait
{

    public function __initializeSubscription()
    {
    }

    /**
     * List new subscription
     * @return mixed
     */
    public function subscriptions(?int $limit = 20): mixed
    {
        $subscriptions = Subscription::paginate($limit);
        return $subscriptions;
    }

    /**
     * Create new subscription
     * @param SubscriptionCreateDto $dto
     * @return Subscription
     */
    public function subscriptionCreate(SubscriptionCreateDto $dto): Subscription
    {
        $meta = [
            'auth_user' => request()->user()->id,
        ];
        $subscription = new Subscription();
        $subscription->payment_refno = $dto->payment_refno;
        $subscription->company_id = $dto->company_id;
        $subscription->plan_id = $dto->plan_id;
        $subscription->payment_method_id = $dto->payment_method_id;
        $subscription->meta = json_encode($meta);
        $subscription->status_id = $dto->status_id;
        $subscription->save();
        return $subscription;
    }

    /**
     * Update new subscription
     * @param SubscriptionCreateDto $dto
     * @param Subscription $subscription
     * @return Subscription
     */
    public function subscriptionUpdate(SubscriptionCreateDto $dto, Subscription $subscription): Subscription
    {
        $subscription->payment_refno = $dto->payment_refno;
        $subscription->company_id = $dto->company_id;
        $subscription->plan_id = $dto->plan_id;
        $subscription->payment_method_id = $dto->payment_method_id;
        $subscription->status_id = $dto->status_id;
        $subscription->save();
        return $subscription;
    }

    /**
     * Show new subscription
     * @param Subscription $subscription
     * @return Subscription
     */
    public function subscriptionShow(Subscription $subscription): Subscription
    {
        return $subscription;
    }

    /**
     * Show new subscription
     * @param Subscription $subscription
     * @return Subscription
     */
    public function subscriptionDelete(Subscription $subscription): Subscription
    {
        $subscription->delete();
        return $subscription;
    }
}
