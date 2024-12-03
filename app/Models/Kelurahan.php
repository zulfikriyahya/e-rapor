<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelurahan extends Model
{
    use HasFactory, SoftDeletes, HasRoles;
    protected $fillable = [
        'nama',
        'kecamatan_id',
    ];
    protected $casts = [
        'id' => 'integer'
    ];

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class);
    }
    public function siswa(): HasMany
    {
        return $this->hasMany(Siswa::class);
    }
}
