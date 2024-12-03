<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class MataPelajaran extends Model
{
    use HasFactory, HasRoles, SoftDeletes;

    protected $fillable = [
        'kode',
        'nama',
    ];

    protected $casts = [
        'id' => 'integer',
    ];
    // public function guru(): HasMany
    // {
    //     return $this->hasMany(Guru::class);
    // }
    // public function nilai(): HasMany
    // {
    //     return $this->hasMany(Nilai::class);
    // }
}
