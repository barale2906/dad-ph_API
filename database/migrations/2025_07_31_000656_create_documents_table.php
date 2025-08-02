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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nombre del documento');
            $table->string('path')->comment('Ruta del documento en el servidor');
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('ID del usuario que subió el documento');
            $table->integer('version')->comment('Versión del documento');
            $table->integer('status')->default(0)->comment('0: Pendiente, 1: Aprobado, 2: Rechazado');
            $table->date('vigencia_date')->comment('Fecha de vigencia del documento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
