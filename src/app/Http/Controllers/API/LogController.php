<?php

namespace App\Http\Controllers\API;

use App\Dto\API\LogCreateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\LogCreateRequest;
use App\Http\Resources\API\GenericResource;
use App\Models\Log;
use App\Services\Base;
use Illuminate\Http\Request;

class LogController extends Controller
{
    private $service;

    public function __construct(Base $service)
    {
        $this->service = $service;
        $this->authorizeResource(Log::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new GenericResource(
            $this->service->logs(
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
    public function store(LogCreateRequest $request)
    {
        return new GenericResource(
            $this->service->logCreate(
                LogCreateDto::fromRequest($request),
            ),
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Log $log)
    {
        return new GenericResource(
            $this->service->logShow(
                $log
            ),
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Log $log)
    {
        return new GenericResource(
            $this->service->logUpdate(
                LogCreateDto::fromRequest($request),
                $log
            ),
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Log $log)
    {
        return new GenericResource(
            $this->service->logDelete(
                $log
            ),
        );
    }
}
