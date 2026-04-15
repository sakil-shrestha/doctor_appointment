<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function dashboard()
    {
        // $patients=User::with('roles')->where('name','patient')->get();
        // dd($patients);
        $patients=User::role('patient')->get();
        $doctors=User::role('doctor')->get()
    ;    $booked=Appointment::all();
        return view('admin.dashboard',compact('patients','doctors','booked'));
    }
}
