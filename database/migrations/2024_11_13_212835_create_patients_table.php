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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cpatient_name', 100); // Nombre y apellido del paciente
            $table->integer('npatient_dni'); // DNI del paciente
            $table->string('cpatient_address', 200); // Dirección del paciente
            $table->string('cpatient_phone', 20); // Teléfono del paciente
            $table->string('cpatient_sex', 20); // Sexo del paciente
            $table->date('dpatient_birthdate'); // Fecha de nacimiento
            $table->foreignId('id_insurance')
            ->constrained('health_insurances'); // Relación con la tabla obra social
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
