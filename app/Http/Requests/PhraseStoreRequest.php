<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhraseStoreRequest extends FormRequest
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
            'phrase_category_id' => ['nullable', 'exists:phrase_categories,id'],
            'text'               => ['required', 'max:255', 'string'],
            'author'             => ['nullable', 'max:255', 'string'],
            'image'              => ['nullable', 'image', 'max:1024'],
        ];
    }
}
