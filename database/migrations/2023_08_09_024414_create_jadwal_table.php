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
            $table->foreignId('id_matkul')->references('id')->on('matkul');
            $table->foreignId('id_dosen')->references('id')->on('dosen');
            $table->foreignId('id_prodi')->references('id')->on('prodi');
            $table->string('kelas');
            $table->smallInteger('semester')->unsigned();
            $table->date('hari_tanggal');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
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
