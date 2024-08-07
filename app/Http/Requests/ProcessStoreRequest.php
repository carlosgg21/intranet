<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessStoreRequest extends FormRequest
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
            'code' => [
                'required',
                'unique:processes,code',
                'max:255',
                'string',
            ],
            'name' => [
                'required',
                'unique:processes,name',
                'max:255',
                'string',
            ],
            'description'     => ['nullable', 'max:255', 'string'],
            'process_type_id' => ['required', 'exists:process_types,id'],
            'parent_id'       => ['nullable', 'max:255'],
            'areas'           => ['array'],
        ];
    }
}
