<?php

namespace App\Http\Controllers\API\v1;

use App\Dto\API\v1\CompanyCreateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\CompanyCreateRequest;
use App\Http\Resources\API\GenericResource;
use App\Models\Company;
use App\Services\v1;

class CompanyController extends Controller
{
    private $service;

    public function __construct(v1 $service) 
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new GenericResource(
            $this->service->v1Companies(
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
    public function store(CompanyCreateRequest $request)
    {
        return new GenericResource(
            $this->service->v1CompanyCreate(
                CompanyCreateDto::fromRequest($request),
            ),
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return new GenericResource(
            $this->service->v1CompanyShow(
                $company
            ),
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyCreateRequest $request, Company $company)
    {
        return new GenericResource(
            $this->service->v1CompanyUpdate(
                CompanyCreateDto::fromRequest($request),
                $company
            ),
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        return new GenericResource(
            $this->service->v1CompanyDelete(
                $company
            ),
        );
    }
}
