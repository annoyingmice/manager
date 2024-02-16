<?php

namespace App\Http\Controllers\API;

use App\Dto\API\PermissionCreateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\PermissionCreateRequest;
use App\Http\Resources\API\GenericResource;
use App\Models\Permission;
use App\Services\Base;

class PermissionController extends Controller
{
    private $service;

    public function __construct(Base $service)
    {
        $this->service = $service;
        $this->authorizeResource(Permission::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new GenericResource(
            $this->service->permissions(
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
    public function store(PermissionCreateRequest $request)
    {
        return new GenericResource(
            $this->service->permissionCreate(
                PermissionCreateDto::fromRequest($request),
            ),
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        return new GenericResource(
            $this->service->permissionShow(
                $permission
            ),
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionCreateRequest $request, Permission $permission)
    {
        return new GenericResource(
            $this->service->permissionUpdate(
                PermissionCreateDto::fromRequest($request),
                $permission
            ),
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        return new GenericResource(
            $this->service->permissionDelete(
                $permission
            ),
        );
    }
}
