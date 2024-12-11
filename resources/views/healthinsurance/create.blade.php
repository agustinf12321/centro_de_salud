@extends('layouts.master')
@section('content')
<div class="flex py-5 items-center justify-center bg-gray-100">
    <div class="w-4/5 md:w-1/2 lg:w-1/3 bg-white rounded-lg shadow-lg p-8">
        <form action="{{ route('insurances.store') }}" method="POST">
            @csrf

            <h1 class="text-2xl font-bold mb-6">Nueva Obra Social</h1>

            <!-- Nombre de la Obra Social -->
            <div class="relative mb-6">
                <label for="cinsurance_name"
                    class="block text-sm font-medium text-gray-700 mb-1">
                    Nombre de la Obra Social
                </label>
                <input type="text"
                    id="cinsurance_name"
                    name="cinsurance_name"
                    class="peer w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                    placeholder="Escriba la obra social..."
                    value="{{ old('cinsurance_name') }}"
                    required>
                @error('cinsurance_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botones -->
            <div class="flex justify-between">
                <a href="{{ route('insurances.index') }}"
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