{{-- @extends('layouts.master')
@section('content') --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex justify-center vh-100 py-5">
        <div
            class="w-4/5 md:w-1/2 lg:w-1/3 bg-white rounded-lg shadow-lg p-8">
            <form action="{{ route('appointments.patient') }}" method="POST">
                @csrf

                <h1 class="text-3xl font-bold mb-6">Ingrese su documento</h1>
                <!--DNI Paciente-->
                <div class="mb-6">
                    <label for="npatient_dni"
                        class="block text-sm font-medium text-gray-700 mb-1">DNI
                    </label>
                    <input type="number"
                        class="block w-full px-3 py-2 text-gray-700 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        id="npatient_dni" name="npatient_dni" placeholder="DNI del paciente"
                        value="{{ old('npatient_dni') }}" required autofocus />
                    @error('npatient_dni')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('home') }}"
                        class="px-4 py-2 bg-yellow-600 text-white font-medium text-sm rounded-md hover:bg-yellow-500 focus:outline-none focus:ring focus:ring-yellow-300">
                        Volver
                    </a>
                    <div class="flex gap-2">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white font-medium text-sm rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300">
                            Buscar turnos
                        </button>
                    </div>
            </form>
        </div>
    </div>
</body>

{{-- @endsection --}}