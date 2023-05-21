<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        if (Auth::user()->role === 'admin') {
            return view('admin.dashboard');
        }
        return to_route('user.dashboard');
    }

    public function user_dashboard()
    {
        if (auth()->user() && auth()->user()->role === 'admin') {
            return to_route('admin.dashboard');
        }
        $doctors = Doctor::all();
        return view('user.home', compact('doctors'));
    }
}
