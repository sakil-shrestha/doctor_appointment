<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {

        $patients=User::where('role','patient')->get();
        return view('patient.index', compact('patients'));
    }

    public function edit($id)
    {
        $patient=User::find($id);
        return view('patient.edit',compact('patient'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
        ]);
        $patient=User::find($id);
        $patient->name=$request->name;
        $patient->email=$request->email;
        $patient->save();
        return redirect()->route('patient.index');
    }
}
