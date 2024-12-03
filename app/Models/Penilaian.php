<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Penilaian extends Model
{
    use HasFactory, HasRoles, SoftDeletes;

    protected $fillable = [
        'nama',
    ];

    protected $casts = [
        'id' => 'integer',
    ];

    // public function tahunPelajaran(): BelongsTo
    // {
    //     return $this->belongsTo(TahunPelajaran::class);
    // }
    public function nilai(): HasMany
    {
        return $this->hasMany(Nilai::class);
    }
}
