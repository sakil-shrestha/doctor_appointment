<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ScheduleController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [

            new Middleware('permission:view appointment', only: ['index']),
            new Middleware('permission:create appointment', only: ['create']),
            new Middleware('permission:edit appointment', only: ['edit']),
            new Middleware('permission:delete appointment', only: ['destroy']),

        ];
    }
    public function index()
    {
        $schedules=Schedule::with('doctor.user')->get();
        return view('schedule.index', compact('schedules'));
    }
    public function create()
    {
        $doctors=Doctor::with('user')->get();
        return view('schedule.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id'=>'required',
            'week_day'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
        ]);

        $schedule = new Schedule();
        $schedule->doctor_id = $request->doctor_id;
        $schedule->day = $request->week_day;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->save();

        return redirect()->route('schedule.index')->with('success', 'Schedule created successfully.');
    }

    public function edit($id)
    {
        $schedule=Schedule::findOrFail($id);
        $doctors=Doctor::with('user')->get();
        return view('schedule.edit', compact('schedule','doctors'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'doctor_id'=>'required',
            'week_day'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->doctor_id = $request->doctor_id;
        $schedule->day = $request->week_day;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->save();

        return redirect()->route('schedule.index')->with('success', 'Schedule updated successfully.');
    }
    public function destroy($id)
    {
        $schedule=Schedule::findOrFail($id);
        $schedule->delete();
        return redirect()->route('schedule.index')->with('success', 'Schedule deleted successfully.');
    }
}
