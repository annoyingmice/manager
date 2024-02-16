<?php

namespace App\Http\Controllers\API\v1;

use App\Dto\API\v1\UserRequestCreateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\UserRequestCreateRequest;
use App\Http\Resources\API\GenericResource;
use App\Models\UserRequest;
use App\Services\Base;

class UserRequestController extends Controller
{
    private $service;

    public function __construct(Base $service) 
    {
        $this->service = $service;
        // $this->authorizeResource(UserRequest::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new GenericResource(
            $this->service->v1UserRequests(
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
    public function store(UserRequestCreateRequest $request)
    {
        return new GenericResource(
            $this->service->v1UserRequestCreate(
                UserRequestCreateDto::fromRequest($request),
            ),
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(UserRequest $userRequest)
    {
        return new GenericResource(
            $this->service->v1UserRequestShow(
                $userRequest
            ),
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserRequest $userRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequestCreateRequest $request, UserRequest $userRequest)
    {
        return new GenericResource(
            $this->service->v1UserRequestUpdate(
                UserRequestCreateDto::fromRequest($request),
                $userRequest
            ),
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserRequest $userRequest)
    {
        return new GenericResource(
            $this->service->v1UserRequestDelete(
                $userRequest
            ),
        );
    }
}
