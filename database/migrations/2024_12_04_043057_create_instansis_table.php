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
            $table->string('nss')->nullable();
            $table->string('logo')->nullable();
            $table->string('nama_kepala');
            $table->string('nip_kepala')->nullable();
            $table->string('tte_kepala')->nullable();
            $table->string('status')->enum('Negeri', 'Swasta');
            $table->string('alamat');
            $table->string('kode_pos');
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
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
