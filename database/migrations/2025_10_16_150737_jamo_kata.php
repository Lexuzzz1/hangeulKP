<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jamo_kata', function (Blueprint $table) {
            // 1. Tambahkan ini (Primary Key sendiri)
            $table->id(); 

            // 2. Definisi Foreign Key tetap sama
            $table->foreignId('id_jamo')->constrained('jamo', 'id_jamo')->onDelete('cascade');
            $table->foreignId('id_kata')->constrained('kata', 'id_kata')->onDelete('cascade');

            // 3. HAPUS baris ini:
            // $table->primary(['id_jamo', 'id_kata']);

            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jamo_kata');
    }
};