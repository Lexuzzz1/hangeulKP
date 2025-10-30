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
        Schema::create('hangeul_kata', function (Blueprint $table) {

        $table->unsignedBigInteger('id_hangeul');
        $table->unsignedBigInteger('id_kata');

        // FOREIGN KEY
        $table->foreign('id_hangeul')->references('id_hangeul')->on('hangeul')->onDelete('cascade');
        $table->foreign('id_kata')->references('id_kata')->on('kata')->onDelete('cascade');

        // OPTIONAL: Jika tidak ingin ada duplicated row
        $table->primary(['id_hangeul', 'id_kata']);

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('hangeul_kata');
    }
};
