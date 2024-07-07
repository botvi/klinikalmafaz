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
        Schema::create('rekammedis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id');
            $table->foreignId('dokter_id');
            $table->foreignId('perawat_id')->nullable();
            $table->foreignId('penyakit_id');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekammedis');
    }
};
