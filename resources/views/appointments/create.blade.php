@extends('layouts.master')
@section('content')
<div class="flex py-5 items-center justify-center bg-gray-100">
    <div class="w-4/5 md:w-1/2 lg:w-1/3 bg-white rounded-lg shadow-lg p-8">
        <form action="{{ route('appointments.store')}}" method="POST">

            @csrf

            <h1 class="text-2xl font-bold mb-6">Nuevo Turno</h1>

            <!--Paciente-->
            <label for="id_patient" class="block text-sm font-medium text-gray-700">Paciente</label>
            <div class="relative mb-6">
                <select name="id_patient" id="patient" class="peer block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="" disabled selected>Seleccione un paciente...</option>
                    @foreach ($patients as $patient)
                        <option value="{{$patient->id}}">{{$patient->cpatient_name}}</option>
                    @endforeach
                </select>
                @error('id_patient')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!--Doctor-->
            <label for="id_doctor" class="block text-sm font-medium text-gray-700">Doctor</label>
            <div class="relative mb-6">
                <select name="id_doctor" id="id_doctor" class="peer block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="" disabled selected>Seleccione un doctor...</option>
                    @foreach ($doctors as $doctor)
                        <option value="{{$doctor->id}}">{{$doctor->cdoctor_name . " - " . $doctor->speciality->cspeciality_name}}</option>
                    @endforeach
                </select>
                @error('id_doctor')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!--Consultorio-->
            <label for="id_office" class="block text-sm font-medium text-gray-700">Consultorio...</label>
            <div class="relative mb-6">
                <select name="id_office" id="office" class="peer block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="" disabled selected>Seleccione un consultorio...</option>
                    @foreach ($offices as $office)
                        <option value="{{$office->id}}">{{$office->coffice_name}}</option>
                    @endforeach
                </select>
            </div>

            <!--Fecha de Turno-->
            <label for="dtappointment_date" class="block text-sm font-medium text-gray-700">Fecha del Turno</label>
            <div class="relative mb-6">
                <input type="datetime-local" id="dtappointment_date" name="dtappointment_date" class="peer block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('dtappointment_date') }}" required autofocus />
            </div>

            <!--Botones-->
            <div class="flex justify-between">
                <div class="flex">
                    <a href="{{ route('appointments.index') }}" class="inline-block rounded bg-yellow-600 px-6 py-2 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 focus:outline-none focus:ring-0 active:bg-primary-600">
                        Volver
                    </a>
                </div>
                <div class="flex">
                    <button type="submit" class="inline-block rounded bg-blue-600 px-6 py-2 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 focus:outline-none focus:ring-0 active:bg-primary-600">
                        Guardar
                    </button>
                    <button type="reset" class="inline-block rounded bg-red-600 px-6 py-2 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 focus:outline-none focus:ring-0 active:bg-primary-600 ml-2">
                        Cancelar
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection