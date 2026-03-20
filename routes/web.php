<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.home');
});



Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//home route
Route::get('/',[HomeController::class,'home'])->name('home');


// doctor routes
Route::middleware('auth')->prefix('doctors')->group(function()
{
    Route::get('/',[DoctorController::class,'index'])->name('doctor.index');
    Route::get('/create',[DoctorController::class,'create'])->name('doctor.create');
    Route::post('/store',[DoctorController::class,'store'])->name('doctor.store');
    Route::get('edit/{id}',[DoctorController::class,'edit'])->name('doctor.edit');
    Route::put('update/{id}',[DoctorController::class,'update'])->name('doctor.update');
    Route::delete('delete/{id}',[DoctorController::class,'destroy'])->name('doctor.destroy');
});

// schedule routes
Route::middleware('auth')->prefix('schedules')->group(function()
{
    Route::get('/',[ScheduleController::class,'index'])->name('schedule.index');
    Route::get('/create',[ScheduleController::class,'create'])->name('schedule.create');
    Route::post('/store',[ScheduleController::class,'store'])->name('schedule.store');
    Route::get('edit/{id}',[ScheduleController::class,'edit'])->name('schedule.edit');
    Route::put('update/{id}',[ScheduleController::class,'update'])->name('schedule.update');
    Route::delete('delete/{id}',[ScheduleController::class,'destroy'])->name('schedule.destroy');
});


// patient routes
Route::middleware('auth')->prefix('patients')->group(function()
{
    Route::get('/',[PatientController::class,'index'])->name('patient.index');
    Route::get('/create',[PatientController::class,'create'])->name('patient.create');
    Route::post('/store',[PatientController::class,'store'])->name('patient.store');
    Route::get('edit/{id}',[PatientController::class,'edit'])->name('patient.edit');
    Route::put('update/{id}',[PatientController::class,'update'])->name('patient.update');
    Route::delete('delete/{id}',[PatientController::class,'destroy'])->name('patient.destroy');
});

Route::middleware('auth')->prefix('appointments')->group(function()
{
    Route::get('/',[AppointmentController::class,'index'])->name('appointment.index');
    Route::get('/create',[AppointmentController::class,'create'])->name('appointment.create');
    Route::post('/store',[AppointmentController::class,'store'])->name('appointment.store');
    Route::get('edit/{id}',[AppointmentController::class,'edit'])->name('appointment.edit');
    Route::put('update/{id}',[AppointmentController::class,'update'])->name('appointment.update');
    Route::delete('delete/{id}',[AppointmentController::class,'destroy'])->name('appointment.destroy');
});

