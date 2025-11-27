<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('modul', function (Blueprint $table) {
            $table->id('id_modul');
            // Relasi ke Jenis
            $table->foreignId('id_jenis')->constrained('jenis', 'id_jenis')->onDelete('cascade');
            $table->string('nama_modul');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('modul');
    }
};
