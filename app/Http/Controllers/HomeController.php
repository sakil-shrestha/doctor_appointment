<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $doctors=Doctor::with('user')->get();

        return view('frontend.home', compact('doctors'));
    }
}
