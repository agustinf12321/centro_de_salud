<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Speciality\SpecialityController; //especialidades
use App\Http\Controllers\HealthInsurance\HealthInsuranceController; //seguros
use App\Http\Controllers\Office\OfficeController; // consultorios
use App\Http\Controllers\Doctor\DoctorController; // doctores

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//rutas de especialidades
Route::get('/specialities',[ SpecialityController::class, 'index'])
->name('specialities.index');

Route::get('/specialities/create',[ SpecialityController::class, 'create'])
->name('specialities.create');

Route::post('/specialities/store',[ SpecialityController::class, 'store'])
->name('specialities.store');

Route::post('/specialities/update',[ SpecialityController::class, 'update'])
->name('specialities.update');

Route::get('/specialities/edit/{id}',[ SpecialityController::class, 'edit'])
->name('specialities.edit');

Route::get('/specialities/delete/{id}',[ SpecialityController::class, 'destroy'])
->name('specialities.delete');
// fin rutas de especialidades

//rutas de obras sociales
Route::get('/insurances',[ HealthInsuranceController::class, 'index'])
->name('insurances.index');

Route::get('/insurances/create',[ HealthInsuranceController::class, 'create'])
->name('insurances.create');

Route::post('/insurances/store',[ HealthInsuranceController::class, 'store'])
->name('insurances.store');

Route::post('/insurances/update',[ HealthInsuranceController::class, 'update'])
->name('insurances.update');

Route::get('/insurances/edit/{id}',[ HealthInsuranceController::class, 'edit'])
->name('insurances.edit');

Route::get('/insurances/delete/{id}',[ HealthInsuranceController::class, 'destroy'])
->name('insurances.delete');
// fin rutas de obras sociales

// rutas de consultorios
Route::get('/offices',[ OfficeController::class, 'index'])
->name('offices.index');

Route::get('/offices/create',[ OfficeController::class, 'create'])
->name('offices.create');

Route::post('/offices/store',[ OfficeController::class, 'store'])
->name('offices.store');

Route::post('/offices/update',[ OfficeController::class, 'update'])
->name('offices.update');

Route::get('/offices/edit/{id}',[ OfficeController::class, 'edit'])
->name('offices.edit');

Route::get('/offices/delete/{id}',[ OfficeController::class, 'destroy'])
->name('offices.delete');
// fin rutas de consultorios



// rutas de doctores
Route::get('/doctors',[ DoctorController::class, 'index'])
->name('doctors.index');

Route::get('/doctors/create',[ DoctorController::class, 'create'])
->name('doctors.create');

Route::post('/doctors/store',[ DoctorController::class, 'store'])
->name('doctors.store');

Route::post('/doctors/update',[ DoctorController::class, 'update'])
->name('doctors.update');

Route::get('/doctors/edit/{id}',[ DoctorController::class, 'edit'])
->name('doctors.edit');

Route::get('/doctors/delete/{id}',[ DoctorController::class, 'destroy'])
->name('doctors.delete');
// fin rutas de doctores



require __DIR__.'/auth.php';



