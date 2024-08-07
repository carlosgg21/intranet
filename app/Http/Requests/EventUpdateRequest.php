<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
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
            'name'        => ['required', 'max:255', 'string'],
            'date'        => ['required', 'date'],
            'hour'        => ['nullable', 'max:255', 'string'],
            'place'       => ['nullable', 'max:255', 'string'],
            'description' => ['nullable', 'max:255', 'string'],
            'all_day'     => ['required', 'boolean'],
            'repeat'      => [
                'required',
                'in:evento de una sola vez,diariamente,semanalmente (mismo dia próxima semana),mensualmente (misma fecha),anualmente ',
            ],
            'participants' => ['nullable', 'max:255', 'json'],
            'created_by'   => ['nullable', 'max:255', 'string'],
        ];
    }
}
