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
            $table->string('nik')->nullable();
            $table->string('nisn')->nullable();
            $table->string('nipd')->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin')->enum('Laki-laki', 'Perempuan');
            $table->string('agama')->enum('Islam', 'Kristen Protestan', 'Kristen Katholik', 'Hundu', 'Buddha', 'Konghucu');
            $table->string('golongan_darah')->enum('A+', 'B+', 'AB+', 'O', 'A-', 'B-', 'AB-');
            $table->string('status_dalam_keluarga')->enum('Anak Kandung', 'Anak Tiri');
            $table->integer('anak_ke');
            $table->string('alamat_siswa');
            $table->string('telepon_siswa')->nullable();
            $table->string('sekolah_asal')->nullable();
            $table->integer('diterima_dikelas');
            $table->date('tanggal_diterima');
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('alamat_orang_tua');
            $table->string('telepon_orang_tua');
            $table->string('nama_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('alamat_wali')->nullable();
            $table->string('telepon_wali')->nullable();
            $table->string('status')->enum('Aktif', 'Nonaktif');
            $table->string('foto')->nullable();
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
