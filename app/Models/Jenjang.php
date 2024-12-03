<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Jenjang extends Model
{
    use HasFactory, HasRoles, SoftDeletes;

    protected $fillable = [
        'nama',
    ];

    protected $casts = [
        'id' => 'integer',
    ];

    public function tingkat(): HasMany
    {
        return $this->hasMany(Tingkat::class);
    }
}
