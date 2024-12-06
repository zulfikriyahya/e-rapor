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
        Schema::create('sekolah_asals', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('jenjang_id')->constrained('jenjangs')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('npsn');
            $table->string('nss');
            $table->string('alamat');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('kode_pos');
            $table->string('telepon');
            $table->string('email');
            $table->string('website');
            $table->string('logo');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekolah_asals');
    }
};
