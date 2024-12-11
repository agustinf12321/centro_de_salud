@extends('layouts.master')
@section('content')
<div class="flex py-5 items-center justify-center bg-gray-100">
    <div class="w-4/5 md:w-1/2 lg:w-1/3 bg-white rounded-lg shadow-lg p-8">
        <form action="{{ route('patients.update')}}" method="POST">
            @csrf
            <!-- valor oculto de id -->
            <input type="hidden" name="id" value="{{ $patient->id }}">

            <h1 class="text-2xl font-bold mb-6">Editar Paciente</h1>

            <!--Nombre input-->
            <div class="relative mb-6">
            <label for="cpatient_name" class="block text-sm font-medium text-gray-700">Nombre y Apellido</label>
                <input type="text" id="cpatient_name" name="cpatient_name" 
                    class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ $patient->cpatient_name }}" placeholder="Nombre del paciente" required autofocus/>
                @error('cpatient_name') 
                    <span class="text-red-500 text-xs">{{ $message }}</span> 
                @enderror
            </div>

            <!--DNI input-->
            <div class="relative mb-6">
            <label for="npatient_dni" class="block text-sm font-medium text-gray-700">DNI</label>
                <input type="number" id="npatient_dni" name="npatient_dni" 
                    class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ $patient->npatient_dni }}" placeholder="DNI del paciente" required />
                @error('npatient_dni') 
                    <span class="text-red-500 text-xs">{{ $message }}</span> 
                @enderror
            </div>

            <!--Dirección input-->
            <div class="relative mb-6">
            <label for="cpatient_address" class="block text-sm font-medium text-gray-700">Dirección</label>
                <input type="text" id="cpatient_address" name="cpatient_address" 
                    class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ $patient->cpatient_address }}" placeholder="Dirección del paciente" required />
            </div>

            <!--Obra Social input-->
            <div class="relative mb-6">
            <label for="id_insurance" class="block text-sm font-medium text-gray-700">Obra Social</label>
                <select name="id_insurance" class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @foreach ($insurances as $insurance)
                        <option value="{{ $insurance->id }}" {{ $patient->id_insurance == $insurance->id ? 'selected' : '' }}>{{ $insurance->cinsurance_name }}</option>
                    @endforeach
                </select>
            </div>

            <!--Celular input-->
            <div class="relative mb-6">
            <label for="cpatient_phone" class="block text-sm font-medium text-gray-700">Celular</label>
                <input type="text" id="cpatient_phone" name="cpatient_phone" 
                    class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ $patient->cpatient_phone }}" placeholder="Número del Paciente" required />
                @error('cpatient_phone') 
                    <span class="text-red-500 text-xs">{{ $message }}</span> 
                @enderror
            </div>

            <!--Sexo input-->
            <div class="relative mb-6">
            <label for="cpatient_sex" class="block text-sm font-medium text-gray-700">Sexo</label>
                <input type="text" id="cpatient_sex" name="cpatient_sex" 
                    class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ $patient->cpatient_sex }}" placeholder="Sexo del paciente" required />
                @error('cpatient_sex') 
                    <span class="text-red-500 text-xs">{{ $message }}</span> 
                @enderror
            </div>

            <!--Fecha de Nacimiento input-->
            <div class="relative mb-6">
            <label for="dpatient_birthdate" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
                <input type="date" id="dpatient_birthdate" name="dpatient_birthdate" 
                    class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ $patient->dpatient_birthdate }}" required />               
            </div>

            <div class="flex justify-between">
                <div class="flex justify-start w-1/2">
                    <a href="{{ route('patients.index') }}">
                        <span
                            class="inline-block rounded bg-yellow-600 px-4 py-2 text-sm font-medium text-white shadow hover:bg-yellow-500 focus:outline-none focus:ring focus:ring-yellow-400">
                            Volver
                        </span>
                    </a>
                </div>

                <div class="space-x-2">
                    <!--Submit button-->
                    <button type="submit" class="inline-block rounded bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-400">
                        Actualizar
                    </button>

                    <button type="reset" class="inline-block rounded bg-red-600 px-4 py-2 text-sm font-medium text-white shadow hover:bg-red-500 focus:outline-none focus:ring focus:ring-red-400">
                        Cancelar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection