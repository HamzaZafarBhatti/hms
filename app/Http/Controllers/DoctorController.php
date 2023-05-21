<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $doctors = Doctor::paginate(10);
        return view('admin.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:doctors',
            'phone' => 'required',
            'speciality' => 'required',
            'room_no' => 'required',
            'image' => 'required',
        ]);

        $file = $request->file('image');
        $image = time() . '.' . $file->getClientOriginalExtension();
        $request->image->move('upload/doctor', $image);
        $data['image'] = $image;

        Doctor::create($data);

        return to_route('doctors.index')->with('success', 'Doctor record addded!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
        return view('admin.doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('doctors')->ignore($doctor->id)],
            'phone' => 'required',
            'speciality' => 'required',
            'room_no' => 'required',
            'image' => 'required',
        ]);

        $file = $request->file('image');
        $image = time() . '.' . $file->getClientOriginalExtension();
        $request->image->move('upload/doctor', $image);
        $data['image'] = $image;

        $doctor->update($data);

        return to_route('doctors.index')->with('success', 'Doctor record updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
        $doctor->delete();

        return to_route('doctors.index')->with('success', 'Doctor record deleted!');
    }
}
