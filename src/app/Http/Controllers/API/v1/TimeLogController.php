<?php

namespace App\Http\Controllers\API\v1;

use App\Dto\API\v1\TimeLogCreateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\TimeLogCreateRequest;
use App\Http\Resources\API\GenericResource;
use App\Models\TimeLog;
use App\Services\Base;

class TimeLogController extends Controller
{
    private $service;

    public function __construct(Base $service) 
    {
        $this->service = $service;
        $this->authorizeResource(TimeLog::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new GenericResource(
            $this->service->v1TimeLogs(
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
    public function store(TimeLogCreateRequest $request)
    {
        return new GenericResource(
            $this->service->v1TimeLogCreate(
                TimeLogCreateDto::fromRequest($request),
            ),
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(TimeLog $timeLog)
    {
        return new GenericResource(
            $this->service->v1TimeLogShow(
                $timeLog
            ),
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TimeLog $timeLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TimeLogCreateRequest $request, TimeLog $timeLog)
    {
        return new GenericResource(
            $this->service->v1TimeLogUpdate(
                TimeLogCreateDto::fromRequest($request),
                $timeLog
            ),
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TimeLog $timeLog)
    {
        return new GenericResource(
            $this->service->v1TimeLogDelete(
                $timeLog
            ),
        );
    }
}
