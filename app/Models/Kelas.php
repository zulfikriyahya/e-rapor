<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory, SoftDeletes, HasRoles;
    protected $fillable = [
        'nama',
        'tingkat_id',
        'tahun_pelajaran_id',
    ];
    protected $casts = ['id' => 'integer'];
    public function tingkat(): BelongsTo
    {
        return $this->belongsTo(Tingkat::class);
    }
    public function tahunPelajaran(): BelongsTo
    {
        return $this->belongsTo(TahunPelajaran::class);
    }
    public function siswa(): HasMany
    {
        return $this->hasMany(Siswa::class);
    }
    public function guru(): HasMany
    {
        return $this->hasMany(Guru::class);
    }
}
