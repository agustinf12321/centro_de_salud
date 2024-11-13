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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cdoctor_name'); // Nombre del médico
            $table->integer('ndoctor_dni'); // DNI del médico
            $table->string('cdoctor_address'); // Dirección del médico
            $table->foreignId('id_speciality')->constrained('specialities')->onDelete('cascade'); // Relación con la tabla especialidades
            $table->integer('ndoctor_tuition'); // Matrícula del médico
            $table->string('cdoctor_phone'); // Teléfono del médico
            $table->date('ddoctor_startdate')->nullable(); // Fecha de inicio
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
