<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
     public function dashboard()
    {
        // $patients=User::with('roles')->where('name','patient')->get();
        // dd($patients);

        $patientExist=Role::where('name','patient')->exists();
        if($patientExist)
            {

                $patients = User::role('patient')->get();
            }
            else{
                $patients=collect();
            }
        // $patients=User::role('patient')->get();
        $doctorExist=Role::where('name','doctor')->exists();
        if($doctorExist)
            {

                $doctors = User::role('doctor')->get();
            }
            else{
                $doctors=collect();
            }
        // $doctors=User::role('doctor')->get();
        $booked=Appointment::all();
        return view('admin.dashboard',compact('patients','doctors','booked'));
    }
}
