<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProcessUpdateRequest extends FormRequest
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
                Rule::unique('processes', 'code')->ignore($this->process),
                'max:255',
                'string',
            ],
            'name' => [
                'required',
                Rule::unique('processes', 'name')->ignore($this->process),
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
