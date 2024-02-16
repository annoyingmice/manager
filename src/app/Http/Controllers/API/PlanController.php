<?php

namespace App\Http\Controllers\API;

use App\Dto\API\PlanCreateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\PlanCreateRequest;
use App\Http\Resources\API\GenericResource;
use App\Models\Plan;
use App\Services\Base;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    private $service;

    public function __construct(Base $service)
    {
        $this->service = $service;
        $this->authorizeResource(Plan::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new GenericResource(
            $this->service->plans(
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
    public function store(PlanCreateRequest $request)
    {
        return new GenericResource(
            $this->service->planCreate(
                PlanCreateDto::fromRequest($request),
            ),
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        return new GenericResource(
            $this->service->planShow(
                $plan
            ),
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlanCreateRequest $request, Plan $plan)
    {
        return new GenericResource(
            $this->service->planUpdate(
                PlanCreateDto::fromRequest($request),
                $plan
            ),
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        return new GenericResource(
            $this->service->planDelete(
                $plan
            ),
        );
    }
}
