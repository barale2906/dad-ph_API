<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CorrespondenciaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
                'fecha_recepcion' => $this->fecha_recepcion,
                'remitente' => $this->remitente,
                'destinatario' => $this->destinatario,
                'observaciones' => $this->observaciones,
                'property_id' => $this->property_id,
                'path_llega' => $this->path_llega,
                'path_entrega' => $this->path_entrega,
            ];
    }
}
