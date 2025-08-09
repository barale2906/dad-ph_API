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
        Schema::create('censos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->integer('tipo')->comment('0 propietario, 1 familiar propietario, 2 arrendatario, 3 familiar arrendatario 4 gato, 5 perro, 6 otra mascota, 7 Contacto');
            $table->integer('habitante')->default(0)->comment('0 Residente 1 No residente');
            $table->longText('telefono')->comment('Teléfono de contacto');
            $table->longText('email')->comment('Correo electrónico de contacto');
            $table->longText('name')->comment('nombre del residente');
            $table->longText('observaciones');
            $table->date('fecha_nacimiento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('censos');
    }
};
