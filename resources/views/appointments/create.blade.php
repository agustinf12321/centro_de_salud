@extends('layouts.master')
@section('content')
<div class="flex vh-100">
    <div class="justify-center items-center mx-auto block w-1/2 rounded-lg bg-white p-6 shadow-4 dark:bg-surface-dark">
        <form action="{{ route('appointments.store')}}" method="POST">

            @csrf

            <h1 class="text-2xl font-bold mt-2 ml-2 mb-2">Nuevo Turno</h1>
            <!--Nombre Paciente-->
            <label for="id_office">Paciente</label>
            <div class="relative mb-12">
                <select name="id_patient" id="patient">
                    <option value="" disabled>Seleccione un paciente</option>
                    @foreach ($patients as $patient)
                        <option value=" {{$patient->id}} ">{{$patient->cpatient_name}}</option>
                    @endforeach
                </select>

                <label for="id_patient"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-valid:-translate-y-[0.95rem] peer-valid:scale-[0.8] peer-focus:-translate-y-[0.95rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-300 dark:peer-focus:text-primary">Paciente
                </label>
                @error('id_patient')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!--Nombre Doctor-->
            <label for="id_office">Doctor</label>
            <div class="relative mb-12">
                <select name="id_doctor" id="id_doctor">
                    <option value="" disabled>Seleccione un doctor</option>
                    @foreach ($doctors as $doctor)
                        <option value=" {{$doctor->id}} ">{{$doctor->cdoctor_name}}</option>
                    @endforeach
                </select>

                <label for="id_doctor"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-valid:-translate-y-[0.95rem] peer-valid:scale-[0.8] peer-focus:-translate-y-[0.95rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-300 dark:peer-focus:text-primary">Doctor
                </label>
                @error('id_doctor')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!--consultorio input-->
            <label for="id_office">Consultorio</label>
            <div class="relative mb-12">
                <select name="id_office" id="office">
                    <option value="" disabled selected>Seleccione un consultorio</option>
                    @foreach ($offices as $office)
                        <option value="{{$office->id}}">{{$office->coffice_name}}</option>
                    @endforeach
                </select>

                <label for="id_office"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-valid:-translate-y-[0.95rem] peer-valid:scale-[0.8] peer-focus:-translate-y-[0.95rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-300 dark:peer-focus:text-primary">Consultorio
                </label>
                {{-- @error('cdoctor _name') --}}
                {{-- <span class="text-red-500">{{ $message }}</span>
                @enderror --}}
            </div>
            
            <!--FECHA INICIO input-->
            <div class="relative mb-12">
                <input type="datetime-local"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-black dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                    id="dtappointment_date" name="dtappointment_date" placeholder="Fecha de inicio doctor"
                    value="{{ old('dtappointment_date') }}" required autofocus/>

                <label for="dtappointment_date"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-valid:-translate-y-[0.95rem] peer-valid:scale-[0.8] peer-focus:-translate-y-[0.95rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-300 dark:peer-focus:text-primary">Fecha del Turno
                </label>
                {{-- @error('cdoctor _name')
                <span class="text-red-500">{{ $message }}</span>
                @enderror --}}
            </div>

            <div class="flex">
                <div class="flex justify-start w-1/2">
                    <a href="{{ route('appointments.index') }}">
                        <span
                            class="inline-block rounded bg-yellow-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                            data-twe-ripple-init data-twe-ripple-color="light">
                            Volver
                        </span>
                    </a>
                </div>

                <div class="flex justify-end w-1/2">
                    <!--Submit button-->
                    <button type="submit"
                        class="inline-block rounded bg-blue-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                        data-twe-ripple-init data-twe-ripple-color="light">
                        Guardar
                    </button>

                    <button type="reset"
                        class="inline-block rounded bg-red-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong ml-2"
                        data-twe-ripple-init data-twe-ripple-color="light">
                        Cancelar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection