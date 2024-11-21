@extends('layouts.master')
@section('content')

<div>
    <h1 class="text-3xl font-bold mt-2 ml-2">Turnos</h1>

    {{-- boton de nuevo --}}
    <div class="flex justify-end">
        <a href="{{ route('appointments.create') }}">
            <button type="button" title="Agregar un Turno"
                class="flex items-center rounded bg-blue-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 motion-reduce:transition-none mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg>
                <span class="ml-2">Nuevo Turno</span>
            </button>
        </a>
    </div>

    {{-- <div>
        <form action="{{route('appointments.index')}}">
            <label for="doctor">Doctor:</label>
            <input type="text" name="doctor" id="doctor">
            <label for="especialidad">especialidad</label>
            <select name="especialidad" id="especialidad">
                <option value="">Cualquier especialidad</option>
                @foreach ($specialities as $speciality)
                    <option value="{{$speciality->id}}">{{ $speciality->cspeciality_name }}</option>
                @endforeach
            </select>
            <button type="submit">Filtrar</button>
        </form>
    </div> --}}

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light text-surface dark:text-black">
                        <thead
                            class="border-b border-neutral-200 bg-white font-medium dark:border-white/10 dark:bg-body-dark text-black">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-center">FECHA</th>
                                <th scope="col" class="px-6 py-4 text-center">PACIENTE</th>
                                <th scope="col" class="px-6 py-4 text-center">DOCTOR</th>
                                <th scope="col" class="px-6 py-4 text-center">CONSULTORIO</th>
                                <th scope="col" class="px-6 py-4 text-center">OBRA SOCIAL</th>
                                <th scope="col" class="px-6 py-4 text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($appointments as $appointment)

                            <tr class="border-b border-neutral-200 bg-black/[0.02] dark:border-white/10">
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $appointment->dtappointment_date}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$appointment->cpatient_name}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$appointment->cdoctor_name}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$appointment->coffice_name}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$appointment->cinsurance_name}}</td>


                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="flex justify-center">
                                        <a href="{{ route('appointments.edit', $appointment->id )}}">
                                            <button
                                                class="inline-block rounded bg-blue-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                                                data-twe-ripple-init data-twe-ripple-color="light">
                                                Editar
                                            </button>
                                        </a>
                                        <a href="{{ route('appointments.delete', $appointment->id )}}">
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

                    {{ $appointments->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

@endsection