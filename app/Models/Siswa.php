<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;
    use HasRoles;
    use SoftDeletes;

    protected $fillable = [
        'nama',
        'foto',
        'nik',
        'nisn',
        'nipd',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'status_dalam_keluarga',
        'anak_ke',
        'hobi',
        'cita_cita',
        'golongan_darah',
        'tinggi_badan',
        'berat_badan',
        'alamat_siswa',
        'siswa_provinsi_id',
        'siswa_kabupaten_id',
        'siswa_kecamatan_id',
        'siswa_kelurahan_id',
        'telepon_siswa',
        'sekolah_asal_id',
        'diterima_di_kelas',
        'diterima_tanggal',
        'nama_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'alamat_orang_tua',
        'orang_tua_provinsi_id',
        'orang_tua_kabupaten_id',
        'orang_tua_kecamatan_id',
        'orang_tua_kelurahan_id',
        'telepon_orang_tua',
        'nama_wali',
        'pekerjaan_wali',
        'alamat_wali',
        'wali_provinsi_id',
        'wali_kabupaten_id',
        'wali_kecamatan_id',
        'wali_kelurahan_id',
        'telepon_wali',
        'status',
    ];
    protected $casts = [
        'id' => 'integer',
    ];

    // // Relation Belongs To
    // public function nameOfFunction(): BelongsTo
    // {
    //     return $this->belongsTo(nameOfFunction::class);
    // }

    // // Relation Has Many
    // public function nameOfFunction(): HasMany
    // {
    //     return $this->hasMany(nameOfFunction::class);
    // }
}
