<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Ekstrakurikuler extends Model
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
    // public function semester(): BelongsTo
    // {
    //     return $this->belongsTo(Semester::class);
    // }
    // public function guru(): BelongsTo
    // {
    //     return $this->belongsTo(Guru::class);
    // }

    // public function nilai(): HasMany
    // {
    //     return $this->hasMany(Nilai::class);
    // }
    // public function siswa(): HasMany
    // {
    //     return $this->hasMany(Siswa::class);
    // }
}
