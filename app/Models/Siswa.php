<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Siswa extends Model
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
        'nisn',
        'nipd',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'golongan_darah',
        'status_dalam_keluarga',
        'anak_ke',
        'cita_cita',
        'jumlah_saudara',
        'alamat_siswa',
        'telepon_siswa',
        'sekolah_asal',
        'diterima_dikelas',
        'tanggal_diterima',
        'nama_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'alamat_orang_tua',
        'telepon_orang_tua',
        'nama_wali',
        'pekerjaan_wali',
        'alamat_wali',
        'telepon_wali',
        'status',
        'foto',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tanggal_lahir' => 'date',
        'tanggal_diterima' => 'date',
    ];
}
