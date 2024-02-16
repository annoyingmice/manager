<?php

namespace App\Dto\API\v1;

use App\Http\Requests\API\v1\CompanyUserCreateRequest;

class CompanyUserCreateDto
{
    public function __construct(
        readonly string $user_id,
        readonly string $company_id,
        readonly string $status_id,
        readonly string $employee_no,
    ) {
    }

    /**
     * Serialize request
     * @param CompanyUserCreateRequest $request
     * @return CompanyUserCreateDto
     */
    public static function fromRequest(CompanyUserCreateRequest $request): CompanyUserCreateDto
    {
        return new self(
            user_id: $request->validated('user_id'),
            company_id: $request->validated('company_id'),
            status_id: $request->validated('status_id'),
            employee_no: $request->validated('employee_no'),
        );
    }
}
