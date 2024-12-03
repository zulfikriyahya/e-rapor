<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Provinsi extends Model
{
    use HasFactory, HasRoles, SoftDeletes;

    protected $fillable = [
        'nama',
        'negara_id',
    ];

    protected $casts = [
        'id' => 'integer',
    ];

    public function negara(): BelongsTo
    {
        return $this->belongsTo(Negara::class);
    }

    public function kabupaten(): HasMany
    {
        return $this->hasMany(Kabupaten::class);
    }

    public function siswa(): HasMany
    {
        return $this->hasMany(Siswa::class);
    }

    public function instansi(): HasMany
    {
        return $this->hasMany(Instansi::class);
    }
}
