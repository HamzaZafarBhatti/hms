<?php

namespace App\Http\Controllers;

use App\Enum\AppointmentEnum;
use App\Models\Appointment;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function appointment_store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'date' => 'required',
            'phone' => 'required',
            'doctor_id' => 'required',
            'message' => 'required'
        ]);

        $data['status'] = 0;
        if (auth()->user()) {
            $data['user_id'] = auth()->user()->id;
        }

        Appointment::create($data);

        return back()->with('success', 'Appointment request submitted successfully. We will contact you soon.');
    }

    public function appointment_index()
    {
        $appointments = Appointment::where('user_id', auth()->user()->id)->paginate(10);
        return view('user.appointments.index', compact('appointments'));
    }

    public function appointment_cancel($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => 3]);
        return back()->with('success', 'Appointment has been cancelled.');
    }
}
