<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semester extends Model
{
    use HasFactory;
    use HasRoles;
    use SoftDeletes;

    protected $fillable = [
        // '',
    ];
    protected $casts = [
        // '',
    ];

    // // Relation Belongs To
    // public function nameOfFunction(): BelongsTo
    // {
    //     return $this->belongsTo(nameOfFunction::class);
    // }

    // // Relation Has Many
    // public function nameOfFunction(): HasMany
    // {
    //     return $this->hasMany(nameOfFunction::class);
    // }
}
