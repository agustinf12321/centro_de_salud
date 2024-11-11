<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Speciality\SpecialityController; //especialidades
use App\Http\Controllers\HealthInsurance\HealthInsuranceController; //seguros


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
// fin rutas de especialidades3

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





require __DIR__.'/auth.php';



