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
        Schema::create('formcuti', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('divisi')->nullable();
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('lama');
            $table->string('alasan');
            $table->string('status_kepalaruang')->nullable()->default("-");
            $table->string('status_manajer')->nullable()->default("-");
            $table->string('status_direktur')->nullable()->default("-");
            $table->string('status_hrd')->nullable()->default("-");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formcuti_tabel');
    }
};
