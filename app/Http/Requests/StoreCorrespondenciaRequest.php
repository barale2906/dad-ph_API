<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCorrespondenciaRequest extends FormRequest
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
            'fecha_recepcion' => 'required|date',
            'remitente' => 'required|string',
            'destinatario' => 'required|string',
            'observaciones' => 'required|string',
            'property_id' => 'required|integer|exists:properties,id',
            'path_llega' => 'required|string',
            'path_entrega' => 'required|string',
        ];
    }
}
