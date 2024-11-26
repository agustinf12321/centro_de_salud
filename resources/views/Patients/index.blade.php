@extends('layouts.master')
@section('content')

<div>
    <h1 class="text-3xl font-bold mt-2 ml-2">Lista de Pacientes</h1>

    {{-- boton de nuevo --}}
    <div class="flex justify-end">
        <a href="{{ route('patients.create') }}">
            <button type="button" title="Agregar un Paciente"
                class="flex items-center rounded bg-blue-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 motion-reduce:transition-none mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg>
                <span class="ml-2">Nuevo Paciente</span>
            </button>
        </a>
    </div>

    {{-- Filtro de pacientes --}}

    <div>
        <form action="{{route('patients.index')}}" method="GET">
            <label for="paciente">Paciente:</label>
            <input type="text" name="paciente" id="paciente" value="{{ request('paciente') }}">
            <label for="obrasocial">Obra Social</label>
            <select name="obrasocial" id="obrasocial">
                <option value="">Cualquier Obra Social</option>
                @foreach ($insurances as $insurance)
                    <option value="{{$insurance->id}}" {{ request('obrasocial') == $insurance->id ? 'selected' : '' }}>{{ $insurance->cinsurance_name }}</option>
                @endforeach
            </select>
            <button type="submit" class="inline-block rounded bg-blue-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">Filtrar</button>
            <button type="reset" class="inline-block rounded bg-red-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong ml-2">Limpiar</button>
        </form>
    </div>

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light text-surface dark:text-black">
                        <thead
                            class="border-b border-neutral-200 bg-white font-medium dark:border-white/10 dark:bg-body-dark text-black">
                            <tr>
                                <th scope="col" class="px-6 py-4">#</th>
                                <th scope="col" class="px-6 py-4 text-center">NOMBRE</th>
                                <th scope="col" class="px-6 py-4 text-center">DNI</th>
                                <th scope="col" class="px-6 py-4 text-center">DIRECCION</th>
                                <th scope="col" class="px-6 py-4 text-center">CELULAR</th>
                                <th scope="col" class="px-6 py-4 text-center">SEXO</th>
                                <th scope="col" class="px-6 py-4 text-center">FECHA NACIMIENTO</th>
                                <th scope="col" class="px-6 py-4 text-center">OBRA SOCIAL</th>
                                <th scope="col" class="px-6 py-4 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($patients as $patient)

                            <tr class="border-b border-neutral-200 bg-black/[0.02] dark:border-white/10">
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $patient->id}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$patient->cpatient_name}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$patient->npatient_dni}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$patient->cpatient_address}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$patient->cpatient_phone}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$patient->cpatient_sex}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$patient->dpatient_birthdate}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$patient->cinsurance_name}}</td>


                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="flex justify-center">
                                        <a href="{{ route('patients.edit', $patient->id )}}">
                                            <button
                                                class="inline-block rounded bg-blue-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                                                data-twe-ripple-init data-twe-ripple-color="light">
                                                Editar
                                            </button>
                                        </a>
                                        <a href="{{ route('patients.delete', $patient->id )}}">
                                            <button
                                                class="inline-block rounded bg-red-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong ml-2"
                                                data-twe-ripple-init data-twe-ripple-color="light">
                                                Eliminar
                                            </button>
                                        </a>
                                    </div>

                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>

                    {{ $patients->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

@endsection