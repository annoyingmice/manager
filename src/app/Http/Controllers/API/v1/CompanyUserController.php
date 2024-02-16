<?php

namespace App\Http\Controllers\API\v1;

use App\Dto\API\v1\CompanyUserCreateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\CompanyUserCreateRequest;
use App\Http\Resources\API\GenericResource;
use App\Models\CompanyUser;
use App\Services\Base;

class CompanyUserController extends Controller
{
    private $service;

    public function __construct(Base $service) 
    {
        $this->service = $service;
        $this->authorizeResource(CompanyUser::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new GenericResource(
            $this->service->v1CompanyUsers(
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
    public function store(CompanyUserCreateRequest $request)
    {
        return new GenericResource(
            $this->service->v1CompanyUserCreate(
                CompanyUserCreateDto::fromRequest($request),
            ),
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyUser $companyUser)
    {
        return new GenericResource(
            $this->service->v1CompanyUserShow(
                $companyUser
            ),
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyUser $companyUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyUserCreateRequest $request, CompanyUser $companyUser)
    {
        return new GenericResource(
            $this->service->v1CompanyUserUpdate(
                CompanyUserCreateDto::fromRequest($request),
                $companyUser
            ),
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyUser $companyUser)
    {
        return new GenericResource(
            $this->service->v1CompanyUserDelete(
                $companyUser
            ),
        );
    }
}
