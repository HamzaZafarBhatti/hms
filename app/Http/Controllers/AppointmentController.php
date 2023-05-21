<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::paginate(10);
        return view('admin.appointments.index', compact('appointments'));
    }

    public function accept($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => 1]);
        return back()->with('success', 'Appointment successfully approved!');
    }

    public function reject($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => 2]);
        return back()->with('success', 'Appointment successfully rejected!');
    }

    public function send_email_view($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('admin.appointments.send_email_view', compact('appointment'));
    }

    public function send_email(Request $request, $id)
    {
        $details = $request->validate([
            'greetings' => 'required',
            'body' => 'required',
            'action_text' => 'required',
            'action_url' => 'required',
            'end_part' => 'required',
        ]);
        $appointment = Appointment::findOrFail($id);
        Notification::send($appointment, new SendEmailNotification($details));
        return back()->with('success', 'Notification sent!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return back()->with('deleted', 'Appointment successfully deleted!');
    }
}
