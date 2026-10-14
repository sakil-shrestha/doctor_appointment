<?php

namespace App\Http\Controllers;

use App\Http\Requests\doctorValidate;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        // $search = $request->search;
        $user = Auth::user();

        if ($user->hasRole('doctor')) {
            $doctors = User::with('doctor')->where('id', $user->id)->get();
        } elseif ($user->hasAnyRole(['admin', 'Super Admin'])) {
            $doctors = User::role('doctor')->with('doctor')->get();
        } else {
            $doctors = collect();
        }


        // for searching
        // $doctors=User::with('doctor')->get();
        // if($search)
        //     {

        //         $doctors=User::with('doctor')->where('name','LIKE','%'.$search.'%')
        //         ->orWhere('email','LIKE','%'.$search.'%')

        //         ->get();



        //     }
        // return response()->json($doctors);
        return view('doctor.index', compact('doctors'));
    }

    public function create()
    {
        return view('doctor.create');
    }

    public function store(doctorValidate $request)
    {
        // $request->validate([
        //     'specialization' => 'required',
        //     'bio' => 'required',
        //     'experience_year' => 'required|integer',
        //     'contact' => ['required', 'regex:/^(98|97)\d{8}$/'],
        // ]);

        // $doctor=Doctor::Create([
        //     'contact'= $request->contact,
        //     'specialization'=$request->specialization,
        // ]);


        $doctor = new Doctor();
        $doctor->user_id = Auth::user()->id;
        $doctor->contact = $request->contact;
        $doctor->specialization = $request->specialization;
        $doctor->bio = $request->bio;
        $doctor->experience_years = $request->experience_year;

        $file = $request->profile_image;
        if ($file) {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('image', $filename);
            $doctor->profile_image = 'image/' . $filename;
        }

        $doctor->save();
        return redirect()->route('doctor.index')->with('success', 'Doctor Profile created successfully');
    }

    public function edit($id)
    {
        $user = User::with('doctor')->find($id);

        if (!$user->doctor) {
            $doctor = Doctor::create(['user_id' => $id]);
        } else {
            $doctor = $user->doctor;
        }

        return view('doctor.edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'specialization' => 'required',
            'bio' => 'required',
            'contact' => ['required', 'regex:/^(98|97)\d{8}$/'],
            'experience_year' => 'required|integer'
        ]);

        $doctor = Doctor::find($id);
        $doctor->contact = $request->contact;
        $doctor->specialization = $request->specialization;
        $doctor->bio = $request->bio;
        $doctor->experience_years = $request->experience_year;

        $file = $request->profile_image;
        if ($file) {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('image', $filename);
            $doctor->profile_image = 'image/' . $filename;
        }

        $doctor->save();
        return redirect()->route('doctor.index')->with('success', 'Doctor Profile updated successfully');
    }

    public function destroy($id)
    {
        $user = User::with('doctor')->find($id);

        $user->delete();
        return redirect()->route('doctor.index')->with('success', 'Doctor Profile deleted successfully');
    }

    // public function search(Request $request)
    // {
    //     $query = User::with('doctor')->whereHas('doctor');

    //     if ($request->name) {
    //         $query->where('name', 'LIKE', '%' . $request->name . '%');
    //     }

    //     if ($request->specialization) {
    //         $query->whereHas('doctor', function ($q) use ($request) {
    //             $q->where('specialization', $request->specialization);
    //         });
    //     }

    //     $doctors = $query->get();

    //     return view('frontend.home', compact('doctors'));
    // }
}
