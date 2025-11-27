<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Pastikan create tabelnya 'jamo'
        Schema::create('jamo', function (Blueprint $table) {
            $table->id('id_jamo'); 
            $table->string('hangeul', 10);
            $table->string('pelafalan', 50);
            $table->foreignId('id_jenis')->constrained('jenis', 'id_jenis')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jamo');
    }
};