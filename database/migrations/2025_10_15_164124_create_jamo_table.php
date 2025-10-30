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
        Schema::create('jamo', function (Blueprint $table) {
            $table->id();
            $table->string('hangeul', 1)->unique();
            $table->string('pelafalan', 10);
            $table->enum('jenis', ['konsonan', 'vokal']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jamo');
    }
};
