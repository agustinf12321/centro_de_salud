@extends('layouts.master')
@section('content')
<div class="flex items-center justify-center py-5 bg-gray-100">
    <div class="w-full max-w-lg bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Editar Especialidad</h1>
        <form action="{{ route('specialities.update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $speciality->id }}">

            <!-- Nombre de la Especialidad -->
            <div class="mb-6">
                <label for="cspeciality_name" class="block text-sm font-medium text-gray-700 mb-2">Nombre de la Especialidad</label>
                <input type="text" id="cspeciality_name" name="cspeciality_name" placeholder="Nombre de la especialidad"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ $speciality->cspeciality_name }}" required autofocus />
                @error('cspeciality_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botones -->
            <div class="flex justify-between">
                <a href="{{ route('specialities.index') }}"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium px-4 py-2 rounded shadow">
                    Volver
                </a>
                <div class="flex gap-2">
                    <button type="reset"
                        class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded shadow">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium px-4 py-2 rounded shadow">
                        Actualizar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection