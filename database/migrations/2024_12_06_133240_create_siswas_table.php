<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('foto');
            $table->unsignedInteger('nik');
            $table->unsignedInteger('nisn');
            $table->string('nipd');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin')->enum('Laki-laki', 'Perempuan');
            $table->string('agama')->enum('Islam', 'Kristen Katholik', 'Kristen Protestan', 'Hindu', 'Buddha', 'Konghucu');
            $table->string('status_dalam_keluarga');
            $table->unsignedInteger('anak_ke');
            $table->string('hobi');
            $table->string('cita_cita');
            $table->string('golongan_darah')->enum('A+', 'B+', 'AB+', 'O', 'A-', 'B-', 'AB-');
            $table->unsignedInteger('tinggi_badan');
            $table->unsignedInteger('berat_badan');
            $table->string('alamat_siswa');
            $table->string('siswa_provinsi_id');
            $table->string('siswa_kabupaten_id');
            $table->string('siswa_kecamatan_id');
            $table->string('siswa_kelurahan_id');
            $table->string('telepon_siswa');
            $table->foreignId('sekolah_asal_id')->constrained('sekolah_asals')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('diterima_di_kelas');
            $table->foreign('diterima_di_kelas')->references('id')->on('tingkats')->onDelete('cascade')->onUpdate('cascade');
            $table->date('diterima_tanggal')->nullable();
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('alamat_orang_tua');
            $table->foreignId('orang_tua_provinsi_id')->constrained('provinsis')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('orang_tua_kabupaten_id')->constrained('kabupatens')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('orang_tua_kecamatan_id')->constrained('kecamatans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('orang_tua_kelurahan_id')->constrained('kelurahans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('telepon_orang_tua');
            $table->string('nama_wali');
            $table->string('pekerjaan_wali');
            $table->string('alamat_wali');
            $table->foreignId('wali_provinsi_id')->constrained('provinsis')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('wali_kabupaten_id')->constrained('kabupatens')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('wali_kecamatan_id')->constrained('kecamatans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('wali_kelurahan_id')->constrained('kelurahans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('telepon_wali');
            $table->string('status')->enum('Aktif', 'Nonaktif');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
