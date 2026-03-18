<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors=Doctor::all();
        return view('doctor.index', compact('doctors'));
    }

    public function create()
    {
        return view('doctor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'specialization'=>'required',
            'bio'=>'required',
            'experience_year'=>'required|integer',
           'contact' => ['required', 'regex:/^(98|97)\d{8}$/'],
        ]);

        // $doctor=Doctor::Create([
        //     'contact'= $request->contact,
        //     'specialization'=$request->specialization,
        // ]);


        $doctor=new Doctor();
        $doctor->user_id=Auth::user()->id;
        $doctor->contact=$request->contact;
        $doctor->specialization=$request->specialization;
        $doctor->bio=$request->bio;
        $doctor->experience_years=$request->experience_year;

        $file=$request->profile_image;
        if($file)
            {
                $filename=time().'.'.$file->getClientOriginalExtension();
                $file->move('image',$filename);
                $doctor->profile_image='image/'.$filename;
            }

            $doctor->save();
            return redirect()->route('doctor.index')->with('success','Doctor Profile created successfully');
    }

    public function edit($id)
    {
        $doctor=Doctor::find($id);
        return view('doctor.edit',compact('doctor'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'specialization'=>'required',
            'bio'=>'required',
            'contact' => ['required', 'regex:/^(98|97)\d{8}$/'],
            'experience_year'=>'required|integer'
        ]);

        $doctor=Doctor::find($id);
        $doctor->user_id=Auth::user()->id;
        $doctor->contact=$request->contact;
        $doctor->specialization=$request->specialization;
        $doctor->bio=$request->bio;
        $doctor->experience_years=$request->experience_year;

        $file=$request->profile_image;
        if($file)
            {
                $filename=time().'.'.$file->getClientOriginalExtension();
                $file->move('image',$filename);
                $doctor->profile_image='image/'.$filename;
            }

            $doctor->save();
            return redirect()->route('doctor.index')->with('success','Doctor Profile updated successfully');
    }

    public function destroy($id)
    {
        $doctor=Doctor::find($id);
        if($doctor->profile_image)
            {
                unlink($doctor->profile_image);
            }
        $doctor->delete();
        return redirect()->route('doctor.index')->with('success','Doctor Profile deleted successfully');
    }
}
