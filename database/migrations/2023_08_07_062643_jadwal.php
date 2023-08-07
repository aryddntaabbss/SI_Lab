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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nip_dosen');
            $table->foreignId('id_matkul');
            $table->foreignId('id_kelas');
            $table->foreignId('id_prodi');
            $table->foreignId('id_hari');
            $table->timestamps('tanggal');
            $table->timestamps('waktu_mulai');
            $table->timestamps('waktu_selesai');
            $table->integer('pertemuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
