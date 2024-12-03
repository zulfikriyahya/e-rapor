<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory, SoftDeletes, HasRoles;
    protected $fillable = [
        'nama',
        'nisn',
        'nipd',
        'jenis_kelamin',
        'golongan_darah',
        'kelas_id',
        'alamat',
        'negara_id',
        'provinsi_id',
        'kabupaten_id',
        'kecamatan_id',
        'kelurahan_id',
        'ekstrakurikuler_id',
        'status',
        'foto',
    ];
    protected $casts = ['id' => 'integer'];
    public function negara(): BelongsTo
    {
        return $this->belongsTo(Negara::class);
    }
    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class);
    }
    public function kabupaten(): BelongsTo
    {
        return $this->belongsTo(Kabupaten::class);
    }
    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class);
    }
    public function kelurahan(): BelongsTo
    {
        return $this->belongsTo(Kelurahan::class);
    }
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class);
    }
    public function ekstrakurikuler(): BelongsTo
    {
        return $this->belongsTo(Ekstrakurikuler::class);
    }
    public function nilai(): HasMany
    {
        return $this->hasMany(Nilai::class);
    }
}
