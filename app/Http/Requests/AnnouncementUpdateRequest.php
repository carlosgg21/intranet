<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementUpdateRequest extends FormRequest
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
            'title'      => ['required', 'max:255', 'string'],
            'ad_type_id' => ['required', 'exists:ad_types,id'],
            'text'       => ['required', 'max:255', 'string'],
            'image'      => ['nullable', 'image', 'max:1024'],
            'document'   => ['file', 'max:1024', 'nullable'],
            'created_by' => ['nullable', 'max:255', 'string'],
        ];
    }
}
