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
        Schema::create('marketplace_products', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('imagen_url');
            $table->decimal('precio', 10, 2);
            $table->string('cu_owner');
            $table->foreign('cu_owner')->references('cu')->on('universitarios')->onDelete('cascade');
            $table->string('cu_comprador')->nullable();
            $table->foreign('cu_comprador')->references('cu')->on('universitarios')->onDelete('set null');
            $table->enum('status', ['publicado', 'reservado', 'vendido'])->default('publicado');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketplace_products');
    }
};
