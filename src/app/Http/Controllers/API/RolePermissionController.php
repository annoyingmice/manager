<?php

namespace App\Http\Controllers\API;

use App\Dto\API\RolePermissionCreateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\RolePermissionCreateRequest;
use App\Http\Resources\API\GenericResource;
use App\Models\Role;
use App\Services\Base;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    private $service;

    public function __construct(Base $service) 
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(RolePermissionCreateRequest $request)
    {
        $this->authorize('assign-permissions');
        return new GenericResource(
            $this->service->assignPermission(
                RolePermissionCreateDto::fromRequest($request),
            ),
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
