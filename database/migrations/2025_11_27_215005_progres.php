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
        Schema::create('progres', function (Blueprint $table) {
            $table->id('id_progres');
            
            $table->foreignId('id_modul')->constrained('modul', 'id_modul')->onDelete('cascade');
            $table->foreignId('id_user')->constrained('user', 'id_user')->onDelete('cascade');
            
            $table->integer('presentase_progres')->default(0);
            $table->timestamp('tanggal')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
