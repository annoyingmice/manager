<?php

namespace App\Http\Controllers\API;

use App\Dto\API\SubscriptionCreateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\SubscriptionCreateRequest;
use App\Http\Resources\API\GenericResource;
use App\Models\Subscription;
use App\Services\Base;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    private $service;

    public function __construct(Base $service)
    {
        $this->service = $service;
        $this->authorizeResource(Subscription::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new GenericResource(
            $this->service->subscriptions(
                request()->get('limit'),
            ),
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscriptionCreateRequest $request)
    {
        return new GenericResource(
            $this->service->subscriptionCreate(
                SubscriptionCreateDto::fromRequest($request),
            ),
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscription $subscription)
    {
        return new GenericResource(
            $this->service->subscriptionShow(
                $subscription
            ),
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubscriptionCreateRequest $request, Subscription $subscription)
    {
        return new GenericResource(
            $this->service->subscriptionUpdate(
                SubscriptionCreateDto::fromRequest($request),
                $subscription
            ),
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $subscription)
    {
        return new GenericResource(
            $this->service->subscriptionDelete(
                $subscription
            ),
        );
    }
}
