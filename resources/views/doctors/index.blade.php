@extends('layouts.master')
@section('content')

<div class="container mx-auto px-4 py-6">
    <!-- Título -->
    <h1 class="text-4xl font-semibold text-gray-800 mb-6">Lista de Doctores</h1>

    <!-- Botón: Nuevo Doctor -->
    <div class="flex justify-end gap-4 mb-4">
        <a href="{{ route('doctors.create') }}">
            <button type="button" title="Agregar un Doctor"
                class="flex items-center bg-green-500 hover:bg-green-600 text-white font-medium px-4 py-2 rounded shadow-md transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle mr-2" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg>
                Nuevo Doctor
            </button>
        </a>
    </div>

    <!-- Filtros -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form action="{{ route('doctors.index') }}" method="GET">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Nombre del Doctor -->
                <div>
                    <label for="doctor" class="block text-sm font-medium text-gray-700">Doctor:</label>
                    <input type="text" name="doctor" id="doctor" placeholder="Nombre del doctor..." value="{{ request('doctor') }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <!-- Especialidad -->
                <div>
                    <label for="especialidad" class="block text-sm font-medium text-gray-700">Especialidad:</label>
                    <select name="especialidad" id="especialidad"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Seleccione una especialidad...</option>
                        @foreach ($specialities as $speciality)
                        <option value="{{ $speciality->id }}" {{ request('especialidad') == $speciality->id ? 'selected' : '' }}>
                            {{ $speciality->cspeciality_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <!-- Ordenar por -->
                <div>
                    <label for="orden" class="block text-sm font-medium text-gray-700">Ordenar por:</label>
                    <select name="orden" id="orden"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="0" {{ request('orden') == 0 ? 'selected' : '' }}>Nombre</option>
                        <option value="1" {{ request('orden') == 1 ? 'selected' : '' }}>Especialidad</option>
                        <option value="2" {{ request('orden') == 2 ? 'selected' : '' }}>Fecha de inicio</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-center gap-4 mt-6">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow-md">Filtrar</button>
                <button type="reset" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded shadow-md">Limpiar</button>
            </div>
        </form>
    </div>

    <!-- Tabla -->
    <div class="overflow-hidden border rounded-lg shadow">
        <table class="min-w-full bg-white">
            <thead class="bg-blue-600 text-gray-100 uppercase text-sm">
                <tr>
                    <th class="px-6 py-4 text-center">#</th>
                    <th class="px-6 py-4 text-center">Nombre</th>
                    <th class="px-6 py-4 text-center">DNI</th>
                    <th class="px-6 py-4 text-center">Dirección</th>
                    <th class="px-6 py-4 text-center">Especialidad</th>
                    <th class="px-6 py-4 text-center">Matrícula N°</th>
                    <th class="px-6 py-4 text-center">Celular</th>
                    <th class="px-6 py-4 text-center">Inicio</th>
                    <th class="px-6 py-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($doctors as $doctor)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-center">{{ $doctor->id }}</td>
                    <td class="px-6 py-4 text-center">{{ $doctor->cdoctor_name }}</td>
                    <td class="px-6 py-4 text-center">{{ $doctor->ndoctor_dni }}</td>
                    <td class="px-6 py-4 text-center">{{ $doctor->cdoctor_address }}</td>
                    <td class="px-6 py-4 text-center">{{ $doctor->cspeciality_name }}</td>
                    <td class="px-6 py-4 text-center">{{ $doctor->ndoctor_tuition }}</td>
                    <td class="px-6 py-4 text-center">{{ $doctor->cdoctor_phone }}</td>
                    <td class="px-6 py-4 text-center">{{ $doctor->ddoctor_startdate }}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('doctors.edit', $doctor->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-md">Editar</a>
                            <a href="{{ route('doctors.delete', $doctor->id) }}" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md">Eliminar</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="bg-gray-50 px-4 py-3 border-t">
            <div class="flex justify-center items-center space-x-2">
                @if ($doctors->onFirstPage())
                <span class="px-3 py-1 text-gray-400 bg-gray-200 rounded cursor-not-allowed">Anterior</span>
                @else
                <a href="{{ $doctors->previousPageUrl() }}"
                    class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                    Anterior
                </a>
                @endif

                @foreach ($doctors->getUrlRange(1, $doctors->lastPage()) as $page => $url)
                @if ($page == $doctors->currentPage())
                <span class="px-3 py-1 bg-blue-600 text-white rounded font-bold">{{ $page }}</span>
                @else
                <a href="{{ $url }}"
                    class="px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-blue-500 hover:text-white transition">
                    {{ $page }}
                </a>
                @endif
                @endforeach

                @if ($doctors->hasMorePages())
                <a href="{{ $doctors->nextPageUrl() }}"
                    class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                    Siguiente
                </a>
                @else
                <span class="px-3 py-1 text-gray-400 bg-gray-200 rounded cursor-not-allowed">Siguiente</span>
                @endif
            </div>
        </div>

    </div>
</div>



    </div>
</div>

@include ('layouts.footer')

@endsection