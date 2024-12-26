<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('dni_letters', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->integer('index')->unique(); // Índice del 0 al 22
            $table->char('letter', 1); // Letra asociada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dni_letters');
    }
};
