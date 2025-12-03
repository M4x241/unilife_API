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
        Schema::create('universitarios', function (Blueprint $table) {
            $table->id();
            $table->string('cu')->unique()->comment('Carnet Universitario');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('correo')->unique();
            $table->string('contrasena')->comment('Password: CU + apellido');
            $table->string('whatsapp')->nullable()->comment('Número de WhatsApp, con código de país si aplica');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universitarios');
    }
};
