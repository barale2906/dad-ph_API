<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Correspondencia extends Model
{
    use HasFactory;

    protected $fillable=[
        'fecha_recepcion',
        'remitente',
        'destinatario',
        'observaciones',
        'property_id',
        'path_llega',
        'path_entrega',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
