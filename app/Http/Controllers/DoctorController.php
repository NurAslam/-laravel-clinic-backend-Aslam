<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        // Paginate 10
        $doctors = DB::table('doctors')
            ->when($request->input('name'), function ($query, $doctor_name) {
                return  $query->where('name', 'like', '%' . $doctor_name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('pages.doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_name' => 'required',
            'doctor_specialist' => 'required',
            'doctor_phone' => 'required',
            'doctor_email' => 'required|email',
            'sip' => 'required',
        ]);

        $doctor = new Doctor();
        $doctor-> doctor_name = $request-> doctor_name;
        $doctor-> doctor_specialist = $request-> doctor_specialist;
        $doctor-> doctor_phone = $request-> doctor_phone;
        $doctor-> doctor_email = $request-> doctor_email;
        $doctor-> sip = $request-> sip;
        $doctor-> save();
        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully');
    }

    public function show($id){
        $doctor = Doctor::find($id);
        return view('pages.doctors.show', compact('doctor'));
    }

    public function edit($id)
    {

        $doctor = Doctor::find($id);
        return view('pages.doctors.edit', compact('doctor'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_name' => 'required',
            'doctor_specialist' => 'required',
            'doctor_phone' => 'required',
            'doctor_email' => 'required|email',
            'sip' => 'required',
        ]);

        $doctor = Doctor::find($id);
        $doctor-> doctor_name = $request-> doctor_name;
        $doctor-> doctor_specialist = $request-> doctor_specialist;
        $doctor-> doctor_phone = $request-> doctor_phone;
        $doctor-> doctor_email = $request-> doctor_email;
        $doctor-> sip = $request-> sip;
        $doctor-> save();
        
        return redirect()->route('doctors.index')->with('success', 'Doctor update successfully');
    }
    public function destroy($id)
    {
        $user = Doctor::find($id);
        $user->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfulyy');
    }
}
