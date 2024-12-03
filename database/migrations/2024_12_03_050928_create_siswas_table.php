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
            $table->string('nisn');
            $table->string('nipd');
            $table->string('jenis_kelamin');
            $table->string('golongan_darah');
            $table->foreignId('kelas_id')->constrained('kelas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('alamat');
            $table->foreignId('negara_id')->constrained('negaras')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('provinsi_id')->constrained('provinsis')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kabupaten_id')->constrained('kabupatens')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kecamatan_id')->constrained('kecamatans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kelurahan_id')->constrained('kelurahans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('ekstrakurikuler_id')->constrained('ekstrakurikulers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('status')->enum('aktif', 'nonaktif');
            $table->string('foto');
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
