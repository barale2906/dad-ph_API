<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Censo extends Model
{
    use HasFactory;

    protected $fillable=[
            'property_id',
            'tipo',
            'habitante',
            'telefono',
            'email',
            'name',
            'observaciones',
            'fecha_nacimiento',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
