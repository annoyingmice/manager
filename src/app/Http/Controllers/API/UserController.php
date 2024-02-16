<?php

namespace App\Http\Controllers\API;

use App\Dto\API\UserCreateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\UserCreateRequest;
use App\Http\Resources\API\GenericResource;
use App\Models\User;
use App\Services\Base;

class UserController extends Controller
{
    private $service;

    public function __construct(Base $service) 
    {
        $this->service = $service;
        $this->authorizeResource(User::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        return new GenericResource(
            $this->service->users(
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
    public function store(UserCreateRequest $request) {
        return new GenericResource(
            $this->service->userCreate(
                UserCreateDto::fromRequest($request),
            ),
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new GenericResource(
            $this->service->userShow(
                $user
            ),
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserCreateRequest $request, User $user)
    {
        return new GenericResource(
            $this->service->userUpdate(
                UserCreateDto::fromRequest($request),
                $user
            ),
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        return new GenericResource(
            $this->service->userDelete(
                $user
            ),
        );
    }
}
