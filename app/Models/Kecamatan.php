<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory, SoftDeletes, HasRoles;
    protected $fillable = [
        'nama',
        'kabupaten_id',
    ];
    protected $casts = [
        'id' => 'integer'
    ];

    public function kabupaten(): BelongsTo
    {
        return $this->belongsTo(Kabupaten::class);
    }
    public function kelurahan(): HasMany
    {
        return $this->hasMany(Kelurahan::class);
    }
    public function siswa(): HasMany
    {
        return $this->hasMany(Siswa::class);
    }
}
