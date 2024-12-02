<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semester extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['nama'];
    protected $casts = ['id' => 'integer'];
    public function tahunPelajaran(): HasMany
    {
        return $this->hasMany(TahunPelajaran::class);
    }
}
