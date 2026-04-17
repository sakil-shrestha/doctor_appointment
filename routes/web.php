<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.home');
})->name('home');



// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('role:admin|Super Admin')->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::post('/get-slots', [AppointmentController::class, 'getSlots']);
    Route::post('/book', [AppointmentController::class, 'store'])->name('appointment.store');
    Route::patch('/appointments/{id}/status', [AppointmentController::class, 'updateStatus']);



    // *******permissions*********
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::put('/permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('/permissions/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');


    // *******roles*********
    Route::get('/roles', [RolesController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RolesController::class, 'create'])->name('roles.create');
    Route::post('/roles/store', [RolesController::class, 'store'])->name('roles.store');
    Route::get('/roles/{id}/edit', [RolesController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{id}', [RolesController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{id}', [RolesController::class, 'destroy'])->name('roles.destroy');


    // *******users*********
    Route::get('users/index',[UserController::class,'index'])->name('users.index');
    Route::get('users/create',[UserController::class,'create'])->name('users.create');
    Route::get('users/edit/{id}',[UserController::class,'edit'])->name('users.edit');
    Route::put('users/update/{id}',[UserController::class,'update'])->name('users.update');
    Route::delete('users/destroy/{id}',[UserController::class,'destroy'])->name('users.destroy');
});

require __DIR__ . '/auth.php';


//home route
Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/doctor-profile/{id}', [HomeController::class, 'doctor_profile'])->name('doctor_profile');
    Route::get('/doctor-book/{schedule}', [BookController::class, 'book'])->name('doctor.book');
});


// doctor routes
Route::middleware('auth')->group(function () {
    Route::prefix('doctor')->group(function () {
        Route::get('/', [DoctorController::class, 'index'])->name('doctor.index');
        Route::get('/create', [DoctorController::class, 'create'])->name('doctor.create');
        Route::post('/store', [DoctorController::class, 'store'])->name('doctor.store');
        Route::get('edit/{id}', [DoctorController::class, 'edit'])->name('doctor.edit');
        Route::put('update/{id}', [DoctorController::class, 'update'])->name('doctor.update');
        Route::delete('delete/{id}', [DoctorController::class, 'destroy'])->name('doctor.destroy');
    });

    // schedule routes
    Route::prefix('schedule')->group(function () {
        Route::get('/', [ScheduleController::class, 'index'])->name('schedule.index');
        Route::get('/create', [ScheduleController::class, 'create'])->name('schedule.create');
        Route::post('/store', [ScheduleController::class, 'store'])->name('schedule.store');
        Route::get('edit/{id}', [ScheduleController::class, 'edit'])->name('schedule.edit');
        Route::put('update/{id}', [ScheduleController::class, 'update'])->name('schedule.update');
        Route::delete('delete/{id}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');
    });


    // patient routes
    Route::prefix('patient')->group(function () {
        Route::get('/', [PatientController::class, 'index'])->name('patient.index');
        Route::get('/create', [PatientController::class, 'create'])->name('patient.create');
        Route::post('/store', [PatientController::class, 'store'])->name('patient.store');
        Route::get('edit/{id}', [PatientController::class, 'edit'])->name('patient.edit');
        Route::put('update/{id}', [PatientController::class, 'update'])->name('patient.update');
        Route::delete('delete/{id}', [PatientController::class, 'destroy'])->name('patient.destroy');
    });

    //appointment routes
    Route::prefix('appointment')->group(function () {
        Route::get('/', [AppointmentController::class, 'index'])->name('appointment.index');
        Route::get('/create', [AppointmentController::class, 'create'])->name('appointment.create');
        Route::post('/store', [AppointmentController::class, 'store'])->name('appointment.store');
        Route::get('edit/{id}', [AppointmentController::class, 'edit'])->name('appointment.edit');
        Route::put('update/{id}', [AppointmentController::class, 'update'])->name('appointment.update');
        Route::delete('delete/{id}', [AppointmentController::class, 'destroy'])->name('appointment.destroy');
    });
});
