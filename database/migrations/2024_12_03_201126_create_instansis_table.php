<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('instansis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('npsn');
            $table->string('logo');
            $table->string('nama_kepala');
            $table->string('nip_kepala');
            $table->string('tte_kepala');
            $table->string('status');
            $table->string('alamat');
            $table->foreignId('negara_id')->constrained('negaras')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('provinsi_id')->constrained('provinsis')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kabupaten_id')->constrained('kabupatens')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kecamatan_id')->constrained('kecamatans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kelurahan_id')->constrained('kelurahans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instansis');
    }
};
