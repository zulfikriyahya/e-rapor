<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provinsi extends Model
{
    use HasFactory, SoftDeletes, HasRoles;
    protected $fillable = [
        'nama',
        'negara_id',
    ];
    protected $casts = [
        'id' => 'integer'
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
}
