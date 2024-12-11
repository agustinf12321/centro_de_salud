@extends('layouts.master')
@section('content')
<div class="flex py-5 items-center justify-center bg-gray-100">
    <div class="w-4/5 md:w-1/2 lg:w-1/3 bg-white rounded-lg shadow-lg p-8">
        <form action="{{ route('doctors.store') }}" method="POST">
            @csrf

            <h1 class="text-2xl font-bold mb-6">Nuevo Doctor</h1>

            <!-- Nombre -->
            <div class="relative mb-6">
                <label for="cdoctor_name"
                    class="block text-sm font-medium text-gray-700 mb-1">
                    Nombre y Apellido
                </label>
                <input type="text"
                    id="cdoctor_name"
                    name="cdoctor_name"
                    class="peer w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                    placeholder="Escriba su nombre y apellido..."
                    value="{{ old('cdoctor_name') }}"
                    required>
            </div>


            <!-- DNI -->
            <div class="relative mb-6">
                <label for="ndoctor_dni"
                    class="block text-sm font-medium text-gray-700 mb-1">
                    DNI
                </label>
                <input type="number"
                    id="ndoctor_dni"
                    name="ndoctor_dni"
                    class="peer w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                    placeholder="Escriba su DNI..."
                    value="{{ old('ndoctor_dni') }}"
                    required>
                @error('ndoctor_dni')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Dirección -->
            <div class="relative mb-6">
                <label for="cdoctor_address"
                    class="block text-sm font-medium text-gray-700 mb-1">
                    Dirección
                </label>
                <input type="text"
                    id="cdoctor_address"
                    name="cdoctor_address"
                    class="peer w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                    placeholder="Escriba su dirección..."
                    value="{{ old('cdoctor_address') }}"
                    required>
            </div>

            <!-- Especialidad -->
            <div class="relative mb-6">
            <label for="cdoctor_address"
                    class="block text-sm font-medium text-gray-700 mb-1">
                    Especialidad
                </label>
                <select id="id_speciality" name="id_speciality"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
                    <option value="" disabled selected>Seleccione una especialidad...</option>
                    @foreach ($specialities as $speciality)
                    <option value="{{ $speciality->id }}">{{ $speciality->cspeciality_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Matricula -->
            <div class="relative mb-6">
                <label for="ndoctor_tuition"
                    class="block text-sm font-medium text-gray-700 mb-1">
                    Número de Matrícula
                </label>
                <input type="number"
                    id="ndoctor_tuition"
                    name="ndoctor_tuition"
                    class="peer w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                    placeholder="Escribre su numero de matricula..."
                    value="{{ old('ndoctor_tuition') }}"
                    required>
                @error('ndoctor_tuition')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botones -->
            <div class="flex justify-between">
                <a href="{{ route('doctors.index') }}"
                    class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 focus:outline-none">
                    Volver
                </a>
                <div class="flex space-x-2">
                    <button type="reset"
                        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 focus:outline-none">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none">
                        Guardar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection