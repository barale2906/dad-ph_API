<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'tower_block',
        'unit_number',
        'ownership_coefficient',
    ];

    public function correspondencias(): HasMany
    {
        return $this->hasMany(Correspondencia::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('relationship_type')->withTimestamps();
    }
}
