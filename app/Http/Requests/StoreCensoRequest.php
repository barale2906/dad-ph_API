<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCensoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'property_id' => 'required|integer|exists:properties,id',
            'tipo' => 'required|integer',
            'habitante' => 'required|integer',
            'telefono' => 'required|string',
            'email' => 'required|string',
            'name' => 'required|string',
            'observaciones' => 'required|string',
            'fecha_nacimiento' => 'required|date',
        ];
    }
}
