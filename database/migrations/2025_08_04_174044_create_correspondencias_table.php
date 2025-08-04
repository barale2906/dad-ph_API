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
        Schema::create('correspondencias', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_recepcion')->comment('Fecha de recepción de la correspondencia');
            $table->string('remitente')->comment('Remitente de la correspondencia tercero o empresa');
            $table->string('destinatario')->comment('A nombre de quien se recibe la correspondencia');
            $table->string('observaciones')->comment('Observaciones de la correspondencia');
            $table->foreignId('property_id')->constrained()->onDelete('cascade')->comment('ID de la propiedad a nombre de la cual llego la correspondencia');
            $table->string('path_llega')->nullable()->comment('Ruta de la imagen de cuando llega el paquete');
            $table->string('path_entrega')->nullable()->comment('Ruta de la imagen de cuando se entrega el paquete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('correspondencias');
    }
};
