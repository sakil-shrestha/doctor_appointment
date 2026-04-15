<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {

        $doctors = User::role('doctor')->get();

        return view('frontend.home', compact('doctors'));
    }

    public function doctor_profile($id)
    {
        $doctor = Doctor::with('user','schedules')->findOrFail($id);

        return view('frontend.doctor-profile', compact('doctor'));
    }


}
