<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    public function home()
    {
        $doctorExist=Role::where('name','doctor')->exists();
        if($doctorExist)
            {

                $doctors = User::role('doctor')->get();
            }
            else{
                $doctors=collect();
            }

        return view('frontend.home', compact('doctors'));
    }

    public function doctor_profile($id)
    {
        $doctor = Doctor::with('user','schedules')->findOrFail($id);

        return view('frontend.doctor-profile', compact('doctor'));
    }


}
