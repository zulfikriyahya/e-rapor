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
        Schema::create('tingkats', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenjang')->enum('SD/MI', 'SMP/MTs', 'SMA/SMK/MA');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tingkats');
    }
};
