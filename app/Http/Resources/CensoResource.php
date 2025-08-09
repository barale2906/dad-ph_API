<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CensoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'property_id' => $this->property_id,
            'tipo' => $this->tipo,
            'habitante' => $this->habitante,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'name' => $this->name,
            'observaciones' => $this->observaciones,
            'fecha_nacimiento' => $this->fecha_nacimiento,
        ];
    }
}
