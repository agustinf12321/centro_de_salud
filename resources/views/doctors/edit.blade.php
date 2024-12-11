@extends('layouts.master')
@section('content')
<div class="flex items-center justify-center py-5 bg-gray-100">
    <div class="w-full max-w-2xl p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Editar Doctor</h1>
        <form action="{{ route('doctors.update') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="id" value="{{ $doctor->id }}">

            <!-- Nombre -->
            <div>
                <label for="cdoctor_name" class="block text-sm font-medium text-gray-700 mb-2">Nombre y apellido</label>
                <input type="text" id="cdoctor_name" name="cdoctor_name" value="{{ $doctor->cdoctor_name }}" required autofocus
                    class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('cdoctor_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- DNI -->
            <div>
                <label for="ndoctor_dni" class="block text-sm font-medium text-gray-700 mb-2">DNI</label>
                <input type="number" id="ndoctor_dni" name="ndoctor_dni" value="{{ $doctor->ndoctor_dni }}" required
                    class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('ndoctor_dni')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Dirección -->
            <div>
                <label for="cdoctor_address" class="block text-sm font-medium text-gray-700 mb-2">Dirección</label>
                <input type="text" id="cdoctor_address" name="cdoctor_address" value="{{ $doctor->cdoctor_address }}" required
                    class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Especialidad -->
            <div>
                <label for="id_speciality" class="block text-sm font-medium text-gray-700 mb-2">Especialidad</label>
                <select id="id_speciality" name="id_speciality"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @foreach ($specialities as $speciality)
                        <option value="{{ $speciality->id }}" 
                            @if ($speciality->id == $doctor->id_speciality) selected @endif>
                            {{ $speciality->cspeciality_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Matrícula -->
            <div>
                <label for="ndoctor_tuition" class="block text-sm font-medium text-gray-700 mb-2">Número de Matrícula</label>
                <input type="number" id="ndoctor_tuition" name="ndoctor_tuition" value="{{ $doctor->ndoctor_tuition }}" required
                    class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Celular -->
            <div>
                <label for="cdoctor_phone" class="block text-sm font-medium text-gray-700 mb-2">Celular</label>
                <input type="text" id="cdoctor_phone" name="cdoctor_phone" value="{{ $doctor->cdoctor_phone }}" required
                    class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Fecha de Inicio -->
            <div>
                <label for="ddoctor_startdate" class="block text-sm font-medium text-gray-700 mb-2">Fecha de Inicio</label>
                <input type="date" id="ddoctor_startdate" name="ddoctor_startdate" value="{{ $doctor->ddoctor_startdate }}" required
                    class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Botones -->
            <div class="flex justify-between">
                <a href="{{ route('doctors.index') }}"
                    class="px-4 py-2 text-sm font-medium text-white bg-yellow-500 rounded-md hover:bg-yellow-600">Volver</a>
                <div class="flex gap-2">
                    <button type="reset" class="px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-md hover:bg-red-600">Cancelar</button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection