<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class TahunPelajaran extends Model
{
    use HasFactory, HasRoles, SoftDeletes;

    protected $fillable = [
        'nama',
    ];

    protected $casts = [
        'id' => 'integer',
    ];

    // public function semester(): BelongsTo
    // {
    //     return $this->belongsTo(Semester::class);
    // }
    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class);
    }

    public function penilaian(): HasMany
    {
        return $this->hasMany(Penilaian::class);
    }

    public function ekstrakurikuler(): HasMany
    {
        return $this->hasMany(Ekstrakurikuler::class);
    }
}
