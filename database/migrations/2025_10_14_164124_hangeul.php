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
        Schema::create('hangeul', function (Blueprint $table) {
            $table->id('id_hangeul');
            $table->string('hangeul', 1)->unique();
            $table->string('pelafalan', 50);
            $table->foreignId('id_jenis')->constrained('jenis', 'id_jenis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hangeul');
    }
};
