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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('dtappointment_date'); // Fecha y hora del turno
            $table->foreignId('id_patient')->constrained('patients')->onDelete('cascade'); // Relación con la tabla pacientes
            $table->foreignId('id_doctor')->constrained('doctors')->onDelete('cascade'); // Relación con la tabla medicos
            $table->foreignId('id_office')->constrained('offices')->onDelete('cascade'); // Relación con la tabla consultorios
            $table->foreignId('id_insurance')
            ->constrained('health_insurances'); // Relación con la tabla obra_social
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
