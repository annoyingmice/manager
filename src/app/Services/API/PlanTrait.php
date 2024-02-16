<?php

namespace App\Services\API;

use App\Dto\API\PlanCreateDto;
use App\Models\Plan;

trait PlanTrait
{

    public function __initializePlan()
    {
    }

    /**
     * List new plans
     * @return mixed
     */
    public function plans(?int $limit = 20): mixed
    {
        $plans = Plan::paginate($limit);
        return $plans;
    }

    /**
     * Create new plan
     * @param PlanCreateDto $dto
     * @return Plan
     */
    public function planCreate(PlanCreateDto $dto): Plan
    {
        $plan = new Plan();
        $plan->name = $dto->name;
        $plan->price = $dto->price;
        $plan->days = $dto->days;
        $plan->save();
        return $plan;
    }

    /**
     * Update new plan
     * @param PlanCreateDto $dto
     * @param Plan $plan
     * @return Plan
     */
    public function planUpdate(PlanCreateDto $dto, Plan $plan): Plan
    {
        $plan->name = $dto->name;
        $plan->price = $dto->price;
        $plan->days = $dto->days;
        $plan->save();
        return $plan;
    }

    /**
     * Show new plan
     * @param Plan $plan
     * @return Plan
     */
    public function planShow(Plan $plan): Plan
    {
        return $plan;
    }

    /**
     * Show new plan
     * @param Plan $plan
     * @return Plan
     */
    public function planDelete(Plan $plan): Plan
    {
        $plan->delete();
        return $plan;
    }
}
