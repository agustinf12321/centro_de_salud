<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


use App\Http\Controllers\Doctor\DoctorController; // doctores
use App\Http\Controllers\Appointment\PDFAppointmentController;
use App\Http\Controllers\Patient\PatientController; // pacientes
use App\Http\Controllers\Office\OfficeController; // consultorios
use App\Http\Controllers\Appointment\AppointmentController; // turnos
use App\Http\Controllers\Speciality\SpecialityController; //especialidades
use App\Http\Controllers\HealthInsurance\HealthInsuranceController; //seguros


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //rutas de especialidades
    Route::get('/specialities', [SpecialityController::class, 'index'])
        ->name('specialities.index');

    Route::get('/specialities/create', [SpecialityController::class, 'create'])
        ->name('specialities.create');

    Route::post('/specialities/store', [SpecialityController::class, 'store'])
        ->name('specialities.store');

    Route::post('/specialities/update', [SpecialityController::class, 'update'])
        ->name('specialities.update');

    Route::get('/specialities/edit/{id}', [SpecialityController::class, 'edit'])
        ->name('specialities.edit');

    Route::get('/specialities/delete/{id}', [SpecialityController::class, 'destroy'])
        ->name('specialities.delete');
    // fin rutas de especialidades

    //rutas de obras sociales
    Route::get('/insurances', [HealthInsuranceController::class, 'index'])
        ->name('insurances.index');

    Route::get('/insurances/create', [HealthInsuranceController::class, 'create'])
        ->name('insurances.create');

    Route::post('/insurances/store', [HealthInsuranceController::class, 'store'])
        ->name('insurances.store');

    Route::post('/insurances/update', [HealthInsuranceController::class, 'update'])
        ->name('insurances.update');

    Route::get('/insurances/edit/{id}', [HealthInsuranceController::class, 'edit'])
        ->name('insurances.edit');

    Route::get('/insurances/delete/{id}', [HealthInsuranceController::class, 'destroy'])
        ->name('insurances.delete');
    // fin rutas de obras sociales




    // rutas de consultorios
    Route::get('/offices', [OfficeController::class, 'index'])
        ->name('offices.index');

    Route::get('/offices/create', [OfficeController::class, 'create'])
        ->name('offices.create');

    Route::post('/offices/store', [OfficeController::class, 'store'])
        ->name('offices.store');

    Route::post('/offices/update', [OfficeController::class, 'update'])
        ->name('offices.update');

    Route::get('/offices/edit/{id}', [OfficeController::class, 'edit'])
        ->name('offices.edit');

    Route::get('/offices/delete/{id}', [OfficeController::class, 'destroy'])
        ->name('offices.delete');
    // fin rutas de consultorios



    // rutas de doctores
    Route::get('/doctors', [DoctorController::class, 'index'])
        ->name('doctors.index');

    Route::get('/doctors/create', [DoctorController::class, 'create'])
        ->name('doctors.create');

    Route::post('/doctors/store', [DoctorController::class, 'store'])
        ->name('doctors.store');

    Route::post('/doctors/update', [DoctorController::class, 'update'])
        ->name('doctors.update');

    Route::get('/doctors/edit/{id}', [DoctorController::class, 'edit'])
        ->name('doctors.edit');

    Route::get('/doctors/delete/{id}', [DoctorController::class, 'destroy'])
        ->name('doctors.delete');
    // fin rutas de doctores



    // rutas de pacientes
    Route::get('/patients', [PatientController::class, 'index'])
        ->name('patients.index');

    Route::get('/patients/create', [PatientController::class, 'create'])
        ->name('patients.create');

    Route::post('/patients/store', [PatientController::class, 'store'])
        ->name('patients.store');

    Route::post('/patients/update', [PatientController::class, 'update'])
        ->name('patients.update');

    Route::get('/patients/edit/{id}', [PatientController::class, 'edit'])
        ->name('patients.edit');

    Route::get('/patients/delete/{id}', [PatientController::class, 'destroy'])
        ->name('patients.delete');
    // fin rutas de pacientes

    // rutas de turnos
    Route::get('/appointments', [AppointmentController::class, 'index'])
        ->name('appointments.index');

    Route::get('/appointments/history', [AppointmentController::class, 'history'])
        ->name('appointments.history');

    Route::get('/appointments/create', [AppointmentController::class, 'create'])
        ->name('appointments.create');

    Route::post('/appointments/store', [AppointmentController::class, 'store'])
        ->name('appointments.store');

    Route::post('/appointments/update', [AppointmentController::class, 'update'])
        ->name('appointments.update');

    Route::get('/appointments/edit/{id}', [AppointmentController::class, 'edit'])
        ->name('appointments.edit');

    Route::get('/appointments/delete/{id}', [AppointmentController::class, 'destroy'])
        ->name('appointments.delete');

    
    // fin rutas de turnos


});



Route::get('/appointments/request', [AppointmentController::class, 'request'])
        ->name('appointments.request');

Route::post('/appointments/patient', [AppointmentController::class, 'patient'])
        ->name('appointments.patient');

Route::get('/appointments/print/{id}', [PDFAppointmentController::class, 'print'])
        ->name('appointments.print');

require __DIR__ . '/auth.php';
