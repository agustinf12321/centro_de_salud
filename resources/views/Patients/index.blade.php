@extends('layouts.master')
@section('content')

<div class="container mx-auto px-4 py-6">
    <!-- Título -->
    <h1 class="text-4xl font-semibold text-gray-800 mb-6">Lista de Pacientes</h1>

    <!-- Botón Nuevo -->
    <div class="mb-4 flex justify-end">
        <a href="{{ route('patients.create') }}">
            <button class="flex items-center bg-green-500 hover:bg-green-600 text-white font-medium px-4 py-2 rounded shadow-md transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle mr-2" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg>
                Nuevo Paciente
            </button>
        </a>
    </div>

    <!-- Filtro -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form action="{{ route('patients.index') }}" method="GET">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Campo Paciente -->
                <div>
                    <label for="paciente" class="block text-sm font-medium text-gray-700">Paciente:</label>
                    <input type="text" name="paciente" placeholder="Encriba el nombre del paciente..." id="paciente" value="{{ request('paciente') }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Campo Obra Social -->
                <div>
                    <label for="obrasocial" class="block text-sm font-medium text-gray-700">Obra Social:</label>
                    <select name="obrasocial" id="obrasocial"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Seleccione una obra social...</option>
                        @foreach ($insurances as $insurance)
                        <option value="{{ $insurance->id }}" {{ request('obrasocial') == $insurance->id ? 'selected' : '' }}>
                            {{ $insurance->cinsurance_name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Campo Orden -->
                <div>
                    <label for="orden" class="block text-sm font-medium text-gray-700">Ordenar por:</label>
                    <select name="orden" id="orden"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="0" {{ request('orden') == 0 ? 'selected' : '' }}>Nombre</option>
                        <option value="1" {{ request('orden') == 1 ? 'selected' : '' }}>DNI</option>
                        <option value="2" {{ request('orden') == 2 ? 'selected' : '' }}>Sexo</option>
                        <option value="3" {{ request('orden') == 3 ? 'selected' : '' }}>Fecha de nacimiento</option>
                        <option value="4" {{ request('orden') == 4 ? 'selected' : '' }}>Obra social</option>
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
                    <th class="px-6 py-4 text-center">Celular</th>
                    <th class="px-6 py-4 text-center">Sexo</th>
                    <th class="px-6 py-4 text-center">Fecha de Nacimiento</th>
                    <th class="px-6 py-4 text-center">Obra Social</th>
                    <th class="px-6 py-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($patients as $patient)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-center">{{ $patient->id }}</td>
                    <td class="px-6 py-4 text-center">{{ $patient->cpatient_name }}</td>
                    <td class="px-6 py-4 text-center">{{ $patient->npatient_dni }}</td>
                    <td class="px-6 py-4 text-center">{{ $patient->cpatient_address }}</td>
                    <td class="px-6 py-4 text-center">{{ $patient->cpatient_phone }}</td>
                    <td class="px-6 py-4 text-center">{{ $patient->cpatient_sex }}</td>
                    <td class="px-6 py-4 text-center">{{ $patient->dpatient_birthdate }}</td>
                    <td class="px-6 py-4 text-center">{{ $patient->cinsurance_name }}</td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('patients.edit', $patient->id) }}">
                                <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-md">Editar</button>
                            </a>
                            <a href="{{ route('patients.delete', $patient->id) }}">
                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md">Eliminar</button>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="bg-gray-50 px-4 py-3 border-t">
            {{ $patients->links() }}
        </div>
    </div>
</div>

@include ('layouts.footer')

@endsection