<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Guru extends Model
{
    use HasFactory, HasRoles, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'nik',
        'nip',
        'nuptk',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'telepon',
        'foto',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tanggal_lahir' => 'date',
    ];

    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class);
    }

    public function pembelajarans(): HasMany
    {
        return $this->hasMany(Pembelajaran::class);
    }

    public function ekstrakurikulers(): HasMany
    {
        return $this->hasMany(Ekstrakurikuler::class);
    }
}
