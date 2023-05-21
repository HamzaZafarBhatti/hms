<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        if (auth()->user() && auth()->user()->role === 'admin') {
            return to_route('admin.dashboard');
        }
        $doctors = Doctor::all();
        return view('user.home', compact('doctors'));
    }
}
