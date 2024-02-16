<?php

namespace App\Dto\API\v1;

use App\Http\Requests\API\v1\TimeLogCreateRequest;

class TimeLogCreateDto
{
    public function __construct(
        readonly ?string $user_id,
        readonly ?string $company_id,
        readonly ?string $time_in_am,
        readonly ?string $time_out_am,
        readonly ?string $time_in_pm,
        readonly ?string $time_out_pm,
        readonly ?string $otp,
        readonly string $employee_no,
    ) {
    }

    /**
     * Serialize request
     * @param TimeLogCreateRequest $request
     * @return TimeLogCreateDto
     */
    public static function fromRequest(TimeLogCreateRequest $request): TimeLogCreateDto
    {
        return new self(
            user_id: $request->validated('user_id'),
            company_id: $request->validated('company_id'),
            time_in_am: $request->validated('time_in_am'),
            time_out_am: $request->validated('time_out_am'),
            time_in_pm: $request->validated('time_in_pm'),
            time_out_pm: $request->validated('time_out_pm'),
            otp: $request->validated('otp'),
            employee_no: $request->validated('employee_no'),
        );
    }
}
