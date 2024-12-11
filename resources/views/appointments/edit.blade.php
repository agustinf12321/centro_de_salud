@extends('layouts.master')
@section('content')
<div class="flex py-5 items-center justify-center bg-gray-100">
    <div class="w-4/5 md:w-1/2 lg:w-1/3 bg-white rounded-lg shadow-lg p-8">
        <form action="{{ route('appointments.update') }}" method="POST">
            @csrf

            <!-- ID oculto -->
            <input type="hidden" name="id" value="{{ $appointment->id }}">

            <h1 class="text-2xl font-bold mb-6">Editar Turno</h1>

            <!-- Selección de Paciente -->
            <div class="relative mb-6">
                <label for="id_patient" class="block text-sm font-medium text-gray-700">
                    Paciente
                </label>
                <select name="id_patient" id="id_patient" 
                        class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="" disabled>Seleccione un paciente</option>
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}" 
                            @if ($patient->id == $appointment->id_patient) selected @endif>
                            {{ $patient->cpatient_name }}
                        </option>
                    @endforeach
                </select>
                @error('id_patient')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Selección de Doctor -->
            <div class="relative mb-6">
                <label for="id_doctor" class="block text-sm font-medium text-gray-700">
                    Doctor
                </label>
                <select name="id_doctor" id="id_doctor" 
                        class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="" disabled>Seleccione un doctor</option>
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}" 
                            @if ($doctor->id == $appointment->id_doctor) selected @endif>
                            {{ $doctor->cdoctor_name }} - {{ $doctor->speciality->cspeciality_name }}
                        </option>
                    @endforeach
                </select>
                @error('id_doctor')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Selección de Consultorio -->
            <div class="relative mb-6">
                <label for="id_office" class="block text-sm font-medium text-gray-700">
                    Consultorio
                </label>
                <select name="id_office" id="id_office" 
                        class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="" disabled selected>Seleccione un consultorio</option>
                    @foreach ($offices as $office)
                        <option value="{{ $office->id }}" 
                            @if ($office->id == $appointment->id_office) selected @endif>
                            {{ $office->coffice_name }}
                        </option>
                    @endforeach
                </select>
                @error('id_office')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Fecha del Turno -->
            <div class="relative mb-6">
                <label for="dtappointment_date" class="block text-sm font-medium text-gray-700">
                    Fecha del Turno
                </label>
                <input type="datetime-local" id="dtappointment_date" name="dtappointment_date" 
                       class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       value="{{ $appointment->dtappointment_date }}" required>
                @error('dtappointment_date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botones -->
            <div class="flex justify-between items-center">
                <a href="{{ route('appointments.index') }}" 
                   class="inline-block rounded bg-yellow-600 px-4 py-2 text-sm font-medium text-white shadow hover:bg-yellow-500 focus:outline-none focus:ring focus:ring-yellow-400">
                    Volver
                </a>
                <div class="space-x-2">
                    <button type="reset" 
                            class="inline-block rounded bg-red-600 px-4 py-2 text-sm font-medium text-white shadow hover:bg-red-500 focus:outline-none focus:ring focus:ring-red-400">
                        Cancelar
                    </button>
                    <button type="submit" 
                            class="inline-block rounded bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-400">
                        Guardar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection