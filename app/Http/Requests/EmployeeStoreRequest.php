<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'identification' => [
                'required',
                'unique:employees,identification',
                'max:255',
                'string',
            ],
            'name'           => ['required', 'max:255', 'string'],
            'last_name'      => ['required', 'max:255', 'string'],
            'charge_id'      => ['nullable', 'exists:charges,id'],
            'area_id'        => ['nullable', 'exists:areas,id'],
            'birthday'       => ['nullable', 'date'],
            'phone'          => ['nullable', 'max:255', 'string'],
            'cell_phone'     => ['nullable', 'max:255', 'string'],
            'email'          => ['nullable', 'email'],
            'hiring_date'    => ['nullable', 'date'],
            'discharge_date' => ['nullable', 'date'],
            'observation'    => ['nullable', 'max:255', 'string'],
            'image'          => ['nullable', 'image', 'max:1024'],
            'code'           => ['nullable', 'max:255', 'string'],
            'company_id'     => ['required', 'exists:companies,id'],
        ];
    }
}
