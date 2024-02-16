<?php

namespace App\Http\Controllers\API;

use App\Dto\API\StatusCreateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\StatusCreateRequest;
use App\Http\Resources\API\GenericResource;
use App\Models\Status;
use App\Services\Base;

class StatusController extends Controller
{
    private $service;

    public function __construct(Base $service)
    {
        $this->service = $service;
        $this->authorizeResource(Status::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new GenericResource(
            $this->service->statuses(
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
    public function store(StatusCreateRequest $request)
    {
        return new GenericResource(
            $this->service->statusCreate(
                StatusCreateDto::fromRequest($request),
            ),
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        return new GenericResource(
            $this->service->statusShow(
                $status
            ),
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StatusCreateRequest $request, Status $status)
    {
        return new GenericResource(
            $this->service->statusUpdate(
                StatusCreateDto::fromRequest($request),
                $status
            ),
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        return new GenericResource(
            $this->service->statusDelete(
                $status
            ),
        );
    }
}
