<?php
namespace App\Services;

use App\Models\Appointment;
use App\Models\Schedule;
use Carbon\Carbon;
use Carbon\CarbonPeriod;


class AppointmentService
{

    // get slots
    public function getSlots($date,$doctorId)
    {

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

        return array_values(array_diff($slots, $booked));

    }

}
