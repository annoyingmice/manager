<?php

namespace App\Http\Requests\API\v1;

use Illuminate\Foundation\Http\FormRequest;

class TimeLogCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required'],
            'company_id' => ['required'],
            'time_in_am' => [],
            'time_out_am' => [],
            'time_in_pm' => [],
            'time_out_pm' => [],
            'otp' => [],
            'employee_no' => ['required'],
        ];
    }
}
