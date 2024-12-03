<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class TahunPelajaran extends Model
{
    use HasFactory, HasRoles, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'semester',
        'tempat_pembagian_rapor',
        'tanggal_pembagian_rapor',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tanggal_pembagian_rapor' => 'date',
    ];

    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class);
    }

    public function ekstrakurikulers(): HasMany
    {
        return $this->hasMany(Ekstrakurikuler::class);
    }
}
