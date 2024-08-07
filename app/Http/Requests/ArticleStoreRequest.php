<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
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
            'title'          => ['required', 'max:255', 'string'],
            'text'           => ['required', 'max:255', 'string'],
            'position'       => ['required', 'numeric'],
            'created_by'     => ['nullable', 'max:255', 'string'],
            'image'          => ['nullable', 'image', 'max:1024'],
            'date'           => ['nullable', 'date'],
            'app_section_id' => ['required', 'exists:app_sections,id'],
        ];
    }
}
