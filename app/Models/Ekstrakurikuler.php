<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ekstrakurikuler extends Model
{
    use HasFactory, SoftDeletes, HasRoles;
    protected $fillable = [
        'nama',
        'guru_id',
        'tahun_pelajaran_id',
        'semester_id',
    ];
    protected $casts = [
        'id' => 'integer',
    ];
    public function tahunPelajaran(): BelongsTo
    {
        return $this->belongsTo(TahunPelajaran::class);
    }
    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }
    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class);
    }
    public function nilai(): HasMany
    {
        return $this->hasMany(Nilai::class);
    }
    public function siswa(): HasMany
    {
        return $this->hasMany(Siswa::class);
    }
}
