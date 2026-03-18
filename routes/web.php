<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
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

