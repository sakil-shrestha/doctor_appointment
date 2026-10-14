<?php

use App\Http\Controllers\DoctorController;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test',function(){
    $doctor=Doctor::all();
    return response()->json($doctor);
});


