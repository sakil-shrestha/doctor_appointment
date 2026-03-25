<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function book(Schedule $schedule)
    {

        $appointment=Appointment::Create([
            'doctor_id'=>$schedule->doctor->id,
            'patient_id'=>Auth::user()->id,
            'appointment_date'=>$schedule->day,
            'appointment_time'=>$schedule->star_time,
        ]);
        return redirect('/');
    }
}
