<?php

namespace App\Http\Controllers\API;

use App\Dto\API\PaymentMethodCreateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\PaymentMethodCreateRequest;
use App\Http\Resources\API\GenericResource;
use App\Models\PaymentMethod;
use App\Services\Base;

class PaymentMethodController extends Controller
{
    private $service;

    public function __construct(Base $service)
    {
        $this->service = $service;
        $this->authorizeResource(PaymentMethod::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new GenericResource(
            $this->service->paymentMethods(
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
    public function store(PaymentMethodCreateRequest $request)
    {
        return new GenericResource(
            $this->service->paymentMethodCreate(
                PaymentMethodCreateDto::fromRequest($request),
            ),
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentMethod $paymentMethod)
    {
        return new GenericResource(
            $this->service->paymentMethodShow(
                $paymentMethod
            ),
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentMethodCreateRequest $request, PaymentMethod $paymentMethod)
    {
        return new GenericResource(
            $this->service->paymentMethodUpdate(
                PaymentMethodCreateDto::fromRequest($request),
                $paymentMethod
            ),
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        return new GenericResource(
            $this->service->paymentMethodDelete(
                $paymentMethod
            ),
        );
    }
}
