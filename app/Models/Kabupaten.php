<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kabupaten extends Model
{
    use HasFactory, SoftDeletes, HasRoles;
    protected $fillable = [
        'nama',
        'provinsi_id',
    ];
    protected $casts = [
        'id' => 'integer'
    ];

    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class);
    }
    public function kecamatan(): HasMany
    {
        return $this->hasMany(Kecamatan::class);
    }
    public function siswa(): HasMany
    {
        return $this->hasMany(Siswa::class);
    }
}
