@extends('layouts.master')
@section('content')

<div class="container mx-auto px-4 py-6">
    <h1 class="text-4xl font-semibold text-gray-800 mb-6">Lista de Consultorios</h1>

    <!-- Botón Nuevo Consultorio -->
    <div class="mb-4 flex justify-end">
        <a href="{{ route('offices.create') }}">
            <button
                class="flex items-center bg-green-500 hover:bg-green-600 text-white font-medium px-4 py-2 rounded shadow-md transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-plus-circle mr-2" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg>
                Nuevo Consultorio
            </button>
        </a>
    </div>

    <!-- Tabla -->
    <div class="overflow-hidden border rounded-lg shadow">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-blue-600 border-b text-gray-100 uppercase text-sm">
                    <th class="px-6 py-4 text-left">#</th>
                    <th class="px-6 py-4 text-center">Nombre</th>
                    <th class="px-6 py-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($offices as $office)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-gray-800">{{ $office->id }}</td>
                    <td class="px-6 py-4 text-center text-gray-800">{{ $office->coffice_name }}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center space-x-3">
                            <a href="{{ route('offices.edit', $office->id) }}">
                                <button
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-md text-sm font-medium shadow transition duration-200">
                                    Editar
                                </button>
                            </a>
                            <a href="{{ route('offices.delete', $office->id) }}">
                                <button
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md text-sm font-medium shadow transition duration-200">
                                    Eliminar
                                </button>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="bg-gray-50 px-4 py-3 border-t flex items-center justify-between">
            {{ $offices->links() }}
        </div>
    </div>
</div>

@include ('layouts.footer')
@endsection