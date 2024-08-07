<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OtherAppStoreRequest extends FormRequest
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
            'name' => [
                'required',
                'unique:other_apps,name',
                'max:255',
                'string',
            ],
            'type'         => ['nullable', 'in:site,aplication'],
            'display_name' => ['nullable', 'max:255', 'string'],
            'url'          => ['nullable', 'url'],
            'icon'         => ['nullable', 'max:255', 'string'],
            'image'        => ['nullable', 'image', 'max:1024'],
            'description'  => ['nullable', 'max:255', 'string'],
        ];
    }
}
