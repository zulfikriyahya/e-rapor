<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TahunPelajaran extends Model
{
    use HasFactory, SoftDeletes, HasRoles;
    protected $fillable = [
        'nama',
        'semester_id'
    ];
    protected $casts = [
        'id' => 'integer'
    ];
    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }
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
