<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $doctorExist = Role::where('name', 'doctor')->exists();
        if ($doctorExist) {

            $query = User::role('doctor')->with('doctor');

            // search by name
            if ($request->filled('name')) {
                $query->where('name', 'like', "%" . $request->name . "%");
            }

            // search by specialization
            if ($request->filled('specialization')) {
                $query->whereHas('doctor', function ($q) use ($request) {
                    $q->where('specialization', $request->specialization);
                });
            }
            $doctors = $query->get();

        } else {
            $doctors = collect();
        }



        return view('frontend.home', compact('doctors'));
    }

    public function doctor_profile($id)
    {
        $doctor = Doctor::with('user', 'schedules')->findOrFail($id);

        return view('frontend.doctor-profile', compact('doctor'));
    }
}
