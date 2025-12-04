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
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->enum('carrera', ['Ciencias de la Computación', 'Telecomunicaciones', 'TIC', 'Sistemas', 'General']);
            $table->text('anuncio');
            $table->text('detalles')->nullable();
            $table->enum('categoria', ['academico', 'evento', 'importante', 'deportes']);
            $table->date('fecha_inicio');
            $table->date('fecha_finalizacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncios');
    }
};
