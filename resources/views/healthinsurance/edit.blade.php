@extends('layouts.master')
@section('content')
<div class="flex items-center justify-center py-5 bg-gray-100">
    <div class="w-full max-w-lg bg-white rounded-lg shadow-lg p-6">
        <form action="{{ route('insurances.update') }}" method="POST"">
            @csrf
            <!-- ID oculto -->
            <input type="hidden" name="id" value="{{ $insurance->id }}">

            <h1 class="text-2xl font-bold mb-6">Editar Obra Social</h1>

            <!-- Nombre de la Obra Social -->
            <div class="mb-6">
                <label for="cinsurance_name"
                    class="block text-sm font-medium text-gray-700 mb-2">
                    Nombre de la Obra Social
                </label>
                <input type="text" id="cinsurance_name" name="cinsurance_name"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Nombre de la Obra Social"
                    value="{{ $insurance->cinsurance_name }}" required autofocus>
                @error('cinsurance_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botones -->
            <div class="flex justify-between items-center">
                <a href="{{ route('insurances.index') }}"
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
                        Actualizar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection