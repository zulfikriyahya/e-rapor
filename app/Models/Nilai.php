<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nilai extends Model
{
    use HasFactory, SoftDeletes, HasRoles;
    protected $fillable = [
        'kode',
        'siswa_id',
        'penilaian_id',
        'mata_pelajaran_id',
        'nilai_angka',
        'nilai_huruf',
        'ekstrakurikuler_id',
        'nilai_ekstrakurikuler_angka',
        'nilai_ekstrakurikuler_huruf',
        'guru_id',
    ];
    protected $casts = [
        'id' => 'integer'
    ];
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }
    public function penilaian(): BelongsTo
    {
        return $this->belongsTo(Penilaian::class);
    }
    public function mataPelajaran(): BelongsTo
    {
        return $this->belongsTo(MataPelajaran::class);
    }
    public function ekstrakurikuler(): BelongsTo
    {
        return $this->belongsTo(Ekstrakurikuler::class);
    }
    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class);
    }
    // public function namaFungsi(): HasMany
    // {
    //     return $this->hasMany(NamaModel::class);
    // }
}
