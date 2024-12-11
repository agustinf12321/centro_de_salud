@extends('layouts.master')
@section('content')

<div class="container mx-auto px-4 py-6">
    <!-- Título -->
    <h1 class="text-4xl font-semibold text-gray-800 mb-6">Turnos</h1>

    <!-- Botones: Historial y Nuevo Turno -->
    <div class="flex justify-end gap-4 mb-4">
        <a href="{{ route('appointments.history') }}">
            <button type="button" title="Historial Turnos"
                class="flex items-center bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded shadow-md transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-clock-history mr-2" viewBox="0 0 16 16">
                    <path d="M8.515 3.435a.5.5 0 0 1 .474.658 7.003 7.003 0 0 0-4.473 4.474.5.5 0 1 1-.95-.316A8.002 8.002 0 0 1 8.514 3.435zM6.5 0a.5.5 0 0 1 .5.5v2.563a.5.5 0 0 1-.5.5h-2.5a.5.5 0 0 1 0-1H6V.5a.5.5 0 0 1 .5-.5zM10 6.5v3h3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5H6V6.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5z" />
                </svg>
                Historial Turnos
            </button>
        </a>

        <a href="{{ route('appointments.create') }}">
            <button type="button" title="Agregar un Turno"
                class="flex items-center bg-green-500 hover:bg-green-600 text-white font-medium px-4 py-2 rounded shadow-md transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle mr-2" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg>
                Nuevo Turno
            </button>
        </a>
    </div>

    <!-- Filtros -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form action="{{ route('appointments.index') }}" method="GET">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Paciente -->
                <div>
                    <label for="paciente" class="block text-sm font-medium text-gray-700">Paciente:</label>
                    <select name="paciente" id="paciente"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Seleccione un paciente...</option>
                        @foreach ($patients as $patient)
                        <option value="{{ $patient->cpatient_name }}" {{ request('paciente') == $patient->cpatient_name ? 'selected' : '' }}>
                            {{ $patient->cpatient_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <!-- Doctor -->
                <div>
                    <label for="doctor" class="block text-sm font-medium text-gray-700">Doctor:</label>
                    <select name="doctor" id="doctor"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Seleccione un doctor...</option>
                        @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->cdoctor_name }}" {{ request('doctor') == $doctor->cdoctor_name ? 'selected' : '' }}>
                            {{ $doctor->cdoctor_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <!-- Orden -->
                <div>
                    <label for="orden" class="block text-sm font-medium text-gray-700">Ordenar por:</label>
                    <select name="orden" id="orden"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="0" {{ request('orden') == 0 ? 'selected' : '' }}>Fecha</option>
                        <option value="1" {{ request('orden') == 1 ? 'selected' : '' }}>Doctor</option>
                        <option value="2" {{ request('orden') == 2 ? 'selected' : '' }}>Paciente</option>
                        <option value="3" {{ request('orden') == 3 ? 'selected' : '' }}>Consultorio</option>
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
                    <th class="px-6 py-4 text-center">Fecha</th>
                    <th class="px-6 py-4 text-center">Paciente</th>
                    <th class="px-6 py-4 text-center">Doctor</th>
                    <th class="px-6 py-4 text-center">Consultorio</th>
                    <th class="px-6 py-4 text-center">Obra Social</th>
                    <th class="px-6 py-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($appointments as $appointment)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-center">{{ $appointment->dtappointment_date }}</td>
                    <td class="px-6 py-4 text-center">{{ $appointment->cpatient_name }}</td>
                    <td class="px-6 py-4 text-center">{{ $appointment->cdoctor_name }}</td>
                    <td class="px-6 py-4 text-center">{{ $appointment->coffice_name }}</td>
                    <td class="px-6 py-4 text-center">{{ $appointment->cinsurance_name }}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('appointments.print', $appointment->id) }}" target="_BLANK" class="flex items-center text-blue-500 hover:underline "><span class="[&>svg]:h-5 [&>svg]:w-5">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path
                                            fill-rule="evenodd"
                                            d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 003 3h.27l-.155 1.705A1.875 1.875 0 007.232 22.5h9.536a1.875 1.875 0 001.867-2.045l-.155-1.705h.27a3 3 0 003-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0018 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM16.5 6.205v-2.83A.375.375 0 0016.125 3h-8.25a.375.375 0 00-.375.375v2.83a49.353 49.353 0 019 0zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 01-.374.409H7.232a.375.375 0 01-.374-.409l.526-5.784a.373.373 0 01.333-.337 41.741 41.741 0 018.566 0zm.967-3.97a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H18a.75.75 0 01-.75-.75V10.5zM15 9.75a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V10.5a.75.75 0 00-.75-.75H15z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span></a>
                            <a href="{{ route('appointments.edit', $appointment->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-md">Editar</a>
                            <a href="{{ route('appointments.delete', $appointment->id) }}" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md">Eliminar</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="bg-gray-50 px-4 py-3 border-t">
            <div class="flex justify-center items-center space-x-2">
                @if ($appointments->onFirstPage())
                <span class="px-3 py-1 text-gray-400 bg-gray-200 rounded cursor-not-allowed">Anterior</span>
                @else
                <a href="{{ $appointments->previousPageUrl() }}"
                    class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                    Anterior
                </a>
                @endif

                @foreach ($appointments->getUrlRange(1, $appointments->lastPage()) as $page => $url)
                @if ($page == $appointments->currentPage())
                <span class="px-3 py-1 bg-blue-600 text-white rounded font-bold">{{ $page }}</span>
                @else
                <a href="{{ $url }}"
                    class="px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-blue-500 hover:text-white transition">
                    {{ $page }}
                </a>
                @endif
                @endforeach

                @if ($appointments->hasMorePages())
                <a href="{{ $appointments->nextPageUrl() }}"
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

@include ('layouts.footer')

@endsection