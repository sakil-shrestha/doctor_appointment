<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Schedule;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('appointment.index');
    }


    //  1. GET SLOTS
    public function getSlots(Request $request)
    {
        $date = $request->date;
        $doctorId = $request->doctor_id;

        

        // Convert date → day (Mon, Tue, etc.)
        $day = Carbon::parse($date)->format('D');

        // Find doctor schedule
        $schedule = Schedule::where('doctor_id', $doctorId)
            ->where('day', $day)
            ->first();

        if (!$schedule) {
            return response()->json([]);
        }

        // Generate slots (30 min)
        $start = Carbon::parse($schedule->start_time);
        $end = Carbon::parse($schedule->end_time);

        $period = CarbonPeriod::create($start, '30 minutes', $end->subMinutes(30));

        $slots = [];

        foreach ($period as $time) {
            $slots[] = $time->format('H:i:s');
        }

        // Remove already booked slots
        $booked = Appointment::where('doctor_id', $doctorId)
            ->where('appointment_date', $date)
            ->pluck('appointment_time')
            ->toArray();

        $availableSlots = array_values(array_diff($slots, $booked));

        return response()->json($availableSlots);


    }

    // 2. STORE APPOINTMENT
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required'
        ]);

        // Prevent double booking
        $exists = Appointment::where('doctor_id', $request->doctor_id)
            ->where('appointment_date', $request->appointment_date)
            ->where('appointment_time', $request->appointment_time)
            ->exists();

        if ($exists) {
            return back()->with('error', 'This slot is already booked');
        }

        // Store appointment
        Appointment::create([
            'patient_id' => Auth::user()->id,
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Appointment booked successfully');
    }
}
