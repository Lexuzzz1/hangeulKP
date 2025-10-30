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
        Schema::create('contoh_kata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jamo_id')->constrained('jamo');
            $table->string('kata_hangeul'); 
            $table->string('arti_indonesia'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contoh_kata');
    }
};
