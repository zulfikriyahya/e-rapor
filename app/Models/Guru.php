<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory, SoftDeletes, HasRoles;
    protected $fillable = [
        'nama',
        'foto',
        'mata_pelajaran_id',
        'kelas_id',
        'jabatan',
        'status',
    ];
    protected $casts = ['id' => 'integer'];
    public function mataPelajaran(): BelongsTo
    {
        return $this->belongsTo(MataPelajaran::class);
    }
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class);
    }
    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function nilai(): HasMany
    {
        return $this->hasMany(Nilai::class);
    }
    public function ekstrakurikuler(): HasMany
    {
        return $this->hasMany(Ekstrakurikuler::class);
    }
}
