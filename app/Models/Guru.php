<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Guru extends Model
{
    use HasFactory, HasRoles, SoftDeletes;

    protected $fillable = [
        'nama',
        'nip',
        'golongan_darah',
        'alamat',
        'negara_id',
        'provinsi_id',
        'kabupaten_id',
        'kecamatan_id',
        'kelurahan_id',
        'foto',
        'jenis_kelamin',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
    ];

    // public function mataPelajaran(): BelongsTo
    // {
    //     return $this->belongsTo(MataPelajaran::class);
    // }
    // public function kelas(): BelongsTo
    // {
    //     return $this->belongsTo(Kelas::class);
    // }
    // public function jabatan(): BelongsTo
    // {
    //     return $this->belongsTo(Jabatan::class);
    // }

    public function nilai(): HasMany
    {
        return $this->hasMany(Nilai::class);
    }

    public function ekstrakurikuler(): HasMany
    {
        return $this->hasMany(Ekstrakurikuler::class);
    }
}
