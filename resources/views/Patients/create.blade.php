@extends('layouts.master')
@section('content')
<div class="flex py-5 items-center justify-center bg-gray-100">
    <div class="w-4/5 md:w-1/2 lg:w-1/3 bg-white rounded-lg shadow-lg p-8">
        <form action="{{ route('patients.store') }}" method="POST">

            @csrf

            <h1 class="text-2xl font-bold mb-6">Nuevo Paciente</h1>

            <!-- Nombre input -->
            <div class="relative mb-6">
                <label for="cpatient_name"
                    class="block text-sm font-medium text-gray-700 mb-1">
                    Nombre y apellido</label>
                <input type="text"
                    class="peer w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                    id="cpatient_name" name="cpatient_name" placeholder="Escriba nombre y apellido..."
                    value="{{ old('cpatient_name') }}" required autofocus>
                @error('cpatient_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- DNI input -->
            <div class="relative mb-6">
            <label for="npatient_dni"
                    class="block text-sm font-medium text-gray-700 mb-1">
                    DNI</label>
                <input type="number"
                    class="peer w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                    id="npatient_dni" name="npatient_dni" placeholder="DNI del paciente..."
                    value="{{ old('npatient_dni') }}" required>
                @error('npatient_dni')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Dirección input -->
            <div class="relative mb-6">
            <label for="cpatient_address"
                    class="block text-sm font-medium text-gray-700 mb-1">
                    Dirección</label>
                <input type="text"
                    class="peer w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                    id="cpatient_address" name="cpatient_address" placeholder="Dirección del paciente..."
                    value="{{ old('cpatient_address') }}" required>
                
            </div>

            <!-- Obra Social input -->
            <div class="relative mb-6">
            <label for="id_insurance"
                    class="block text-sm font-medium text-gray-700 mb-1">
                    Obra Social</label>
                <select name="id_insurance" id="id_insurance"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
                    <option value="" disabled selected>Seleccione una obra social...</option>
                    @foreach ($insurances as $insurance)
                    <option value="{{ $insurance->id }}">{{ $insurance->cinsurance_name }}</option>
                    @endforeach
                </select>
                
            </div>

            <!-- Teléfono input -->
            <div class="relative mb-6">
            <label for="cpatient_phone"
                    class="block text-sm font-medium text-gray-700 mb-1">
                    Celular Paciente</label>
                <input type="text"
                    class="peer w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                    id="cpatient_phone" name="cpatient_phone" placeholder="Número del paciente..."
                    value="{{ old('cpatient_phone') }}" required>
                
            </div>

            <!-- Botones -->
            <div class="flex justify-between">
                <a href="{{ route('patients.index') }}"
                    class="inline-block rounded bg-yellow-500 px-6 py-2 text-sm text-white transition hover:bg-yellow-600">
                    Volver
                </a>
                <div>
                    <button type="submit"
                        class="inline-block rounded bg-blue-500 px-6 py-2 text-sm text-white transition hover:bg-blue-600">
                        Guardar
                    </button>
                    <button type="reset"
                        class="ml-2 inline-block rounded bg-red-500 px-6 py-2 text-sm text-white transition hover:bg-red-600">
                        Cancelar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection