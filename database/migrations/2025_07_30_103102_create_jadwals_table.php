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
        Schema::create('jadwals', function (Blueprint $table) {
        $table->id();
        $table->foreignId('kelas_id')->constrained()->onDelete('cascade');
        $table->foreignId('mata_kuliah_id')->constrained()->onDelete('cascade');
        $table->foreignId('dosen_id')->constrained()->onDelete('cascade');
        $table->string('hari');
        $table->string('jam_mulai');
        $table->string('jam_selesai');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};