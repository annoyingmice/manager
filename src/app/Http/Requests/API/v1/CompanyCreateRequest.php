<?php

namespace App\Http\Requests\API\v1;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCreateRequest extends FormRequest
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
            'avatar' => [],
            'cover' => [],
            'name' => ['required'],
            'email' =>['required', 'email', 'unique:companies,id'],
            'tel' => ['required', 'unique:companies,id'],
            'phone' => ['required', 'unique:companies,id'],
            'address' => ['required']
        ];
    }
}
