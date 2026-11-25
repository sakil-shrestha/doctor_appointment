<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class PatientController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [

            new Middleware('permission:view patient', only: ['index']),
            new Middleware('permission:create patient', only: ['create']),
            new Middleware('permission:edit patient', only: ['edit']),
            new Middleware('permission:delete patient', only: ['destroy']),

        ];
    }
    public function index()
    {

        $patients = User::role('patient')->get();
        return view('patient.index', compact('patients'));
    }

    public function edit($id)
    {
        $patient = User::find($id);
        return view('patient.edit', compact('patient'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $patient = User::find($id);
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->save();
        return redirect()->route('patient.index');
    }
}
