@extends('layouts.master')
@section('content')
<div class="flex vh-100">
    <div class="justify-center items-center mx-auto block w-1/2 rounded-lg bg-white p-6 shadow-4 dark:bg-surface-dark">
        <form action="{{ route('patients.store')}}" method="POST">

            @csrf

            <h1 class="text-2xl font-bold mt-2 ml-2 mb-2">Nuevo Paciente</h1>
            <!--Nombre input-->
            <div class="relative mb-12">
                <input type="text"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-black dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                    id="cpatient_name" name="cpatient_name" placeholder="nombre del paciente"
                    value="{{ old('cpatient_name') }}" required autofocus/>

                <label for="cpatient_name"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-valid:-translate-y-[0.95rem] peer-valid:scale-[0.8] peer-focus:-translate-y-[0.95rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-300 dark:peer-focus:text-primary">Nombre y apellido
                </label>
                @error('cpatient_name')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!--DNI input-->
            <div class="relative mb-12">
                <input type="number"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-black dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                    id="npatient_dni" name="npatient_dni" placeholder="DNI del paciente"
                    value="{{ old('npatient_dni') }}" required autofocus/>

                <label for="npatient_dni"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-valid:-translate-y-[0.95rem] peer-valid:scale-[0.8] peer-focus:-translate-y-[0.95rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-300 dark:peer-focus:text-primary">DNI
                </label>
                @error('npatient_dni')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!--DIRECCION input-->
            <div class="relative mb-12">
                <input type="text"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-black dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                    id="cpatient_address" name="cpatient_address" placeholder="Direccion del paciente"
                    value="{{ old('cpatient_address') }}" required autofocus/>

                <label for="cpatient_address"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-valid:-translate-y-[0.95rem] peer-valid:scale-[0.8] peer-focus:-translate-y-[0.95rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-300 dark:peer-focus:text-primary">Dirección
                </label>
                {{-- @error('cdoctor _name') --}}
                {{-- <span class="text-red-500">{{ $message }}</span>
                @enderror --}}
            </div>
            <!--OBRA SOCIAL input-->
            <div class="relative mb-12">
                <select name="id_insurance" id="">
                    @foreach ($insurances as $insurance)
                        <option value="{{$insurance->id}}">{{$insurance->cinsurance_name}}</option>
                    @endforeach
                </select>

                <label for="id_insurance"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-valid:-translate-y-[0.95rem] peer-valid:scale-[0.8] peer-focus:-translate-y-[0.95rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-300 dark:peer-focus:text-primary">Obra Social
                </label>
                {{-- @error('cdoctor _name')
                <span class="text-red-500">{{ $message }}</span>
                @enderror --}}
            </div>
            <!--CELULAR input-->
            <div class="relative mb-12">
                <input type="text"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-black dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                    id="cpatient_phone" name="cpatient_phone" placeholder="Numero del Paciente"
                    value="{{ old('cpatient_phone') }}" required autofocus/>

                <label for="cpatient_phone"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-valid:-translate-y-[0.95rem] peer-valid:scale-[0.8] peer-focus:-translate-y-[0.95rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-300 dark:peer-focus:text-primary">Celular Paciente
                </label>
                @error('cpatient_phone')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <!--SEXO input-->
            <div class="relative mb-12">
                <input type="text"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-black dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                    id="cpatient_sex" name="cpatient_sex" placeholder="Sexo del paciente"
                    value="{{ old('cpatient_sex') }}" required autofocus/>

                <label for="cpatient_sex"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-valid:-translate-y-[0.95rem] peer-valid:scale-[0.8] peer-focus:-translate-y-[0.95rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-300 dark:peer-focus:text-primary">Sexo
                </label>
                @error('cpatient_sex')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <!--FECHA INICIO input-->
            <div class="relative mb-12">
                <input type="date"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-black dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                    id="dpatient_birthdate" name="dpatient_birthdate" placeholder="Fecha de Nacimiento"
                    value="{{ old('dpatient_birthdate') }}" required autofocus/>

                <label for="dpatient_birthdate"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-valid:-translate-y-[0.95rem] peer-valid:scale-[0.8] peer-focus:-translate-y-[0.95rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-300 dark:peer-focus:text-primary">Fecha de Nacimiento
                </label>
                {{-- @error('cdoctor _name')
                <span class="text-red-500">{{ $message }}</span>
                @enderror --}}
            </div>

            <div class="flex">
                <div class="flex justify-start w-1/2">
                    <a href="{{ route('patients.index') }}">
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