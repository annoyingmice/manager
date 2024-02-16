<?php

namespace App\Http\Controllers\API;

use App\Dto\API\RequestTypeCreateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\RequestTypeCreateRequest;
use App\Http\Resources\API\GenericResource;
use App\Models\RequestType;
use App\Services\Base;
use Illuminate\Http\Request;

class RequestTypeController extends Controller
{
    private $service;

    public function __construct(Base $service)
    {
        $this->service = $service;
        $this->authorizeResource(RequestType::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new GenericResource(
            $this->service->requestTypes(
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
    public function store(RequestTypeCreateRequest $request)
    {
        return new GenericResource(
            $this->service->requestTypeCreate(
                RequestTypeCreateDto::fromRequest($request),
            ),
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(RequestType $requestType)
    {
        return new GenericResource(
            $this->service->requestTypeShow(
                $requestType
            ),
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequestType $requestType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestTypeCreateRequest $request, RequestType $requestType)
    {
        return new GenericResource(
            $this->service->requestTypeUpdate(
                RequestTypeCreateDto::fromRequest($request),
                $requestType
            ),
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequestType $requestType)
    {
        return new GenericResource(
            $this->service->requestTypeDelete(
                $requestType
            ),
        );
    }
}
