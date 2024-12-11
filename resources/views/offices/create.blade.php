@extends('layouts.master')
@section('content')

<div class="flex justify-center vh-100 py-5">
    <div class="w-4/5 md:w-1/2 lg:w-1/3 bg-white rounded-lg shadow-lg p-8">
        <form action="{{ route('offices.store') }}" method="POST">
            @csrf
            <h1 class="text-3xl font-bold mb-6">Nuevo Consultorio</h1>

            <!-- Input de Número del Consultorio -->
            <div class="mb-6">
                <label for="coffice_name" class="block text-sm font-medium text-gray-700 mb-1">Número del Consultorio</label>
                <input type="text" 
                       id="coffice_name" 
                       name="coffice_name" 
                       placeholder="Nombre del consultorio..."
                       value="{{ old('coffice_name') }}" 
                       required 
                       autofocus
                       class="block w-full px-3 py-2 text-gray-700 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                @error('coffice_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botones -->
            <div class="flex justify-between">
                <a href="{{ route('offices.index') }}" 
                   class="px-4 py-2 bg-yellow-600 text-white font-medium text-sm rounded-md hover:bg-yellow-500 focus:outline-none focus:ring focus:ring-yellow-300">
                    Volver
                </a>
                <div class="flex gap-2">
                    <button type="reset"
                            class="px-4 py-2 bg-red-600 text-white font-medium text-sm rounded-md hover:bg-red-500 focus:outline-none focus:ring focus:ring-red-300">
                        Cancelar
                    </button>
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white font-medium text-sm rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300">
                        Guardar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
>
@endsection