<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsUpdateRequest extends FormRequest
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
            'group'        => ['required', 'max:255', 'string'],
            'name'         => ['required', 'max:255', 'string'],
            'display_name' => ['nullable', 'max:255', 'string'],
            'value'        => ['required', 'max:255', 'string'],
            'type'         => ['nullable', 'max:255', 'string'],
            'description'  => ['required', 'max:255', 'string'],
        ];
    }
}
