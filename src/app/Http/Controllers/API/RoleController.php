<?php

namespace App\Http\Controllers\API;

use App\Dto\API\RoleCreateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\RoleCreateRequest;
use App\Http\Resources\API\GenericResource;
use App\Models\Role;
use App\Services\Base;

class RoleController extends Controller
{
    private $service;

    public function __construct(Base $service)
    {
        $this->service = $service;
        $this->authorizeResource(Role::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new GenericResource(
            $this->service->roles(
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
    public function store(RoleCreateRequest $request)
    {
        return new GenericResource(
            $this->service->roleCreate(
                RoleCreateDto::fromRequest($request),
            ),
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return new GenericResource(
            $this->service->roleShow(
                $role
            ),
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleCreateRequest $request, Role $role)
    {
        return new GenericResource(
            $this->service->roleUpdate(
                RoleCreateDto::fromRequest($request),
                $role
            ),
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        return new GenericResource(
            $this->service->roleDelete(
                $role
            ),
        );
    }
}
