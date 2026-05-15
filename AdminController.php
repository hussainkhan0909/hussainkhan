<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;

class AdminController extends Controller
{
    // SHOW FORM
    public function addDoctors()
    {
        return view('admin.add_doctors');
    }

    // STORE DOCTOR
 public function postAddDoctor(Request $request)
{
    $request->validate([
        'doctors_name'   => 'required',
        'doctors_phone'  => 'required',
        'speciality'     => 'required',
        'room_number'    => 'required',
        'doctors_image'  => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $doctor = new Doctor();

    // MATCH WITH DATABASE COLUMN NAMES
    $doctor->doctors_name  = $request->doctors_name;
    $doctor->doctors_phone = $request->doctors_phone;
    $doctor->speciality    = $request->speciality;
    $doctor->room_number   = $request->room_number;

    if ($request->hasFile('doctors_image')) {

        $image = $request->file('doctors_image');
        $image_name = time().'.'.$image->getClientOriginalExtension();

        $doctor->doctors_image = $image_name;

        $image->move(public_path('project_img'), $image_name);
    }

    $doctor->save();

    return redirect()->back()->with('doctor_addmessage', 'Doctor Added Successfully!');
}
public function viewDoctors(){
    $doctors = Doctor::all(); // 👈 YE LINE MISSING THI
    return view('admin.view_doctors', compact('doctors'));
}
public function deleteDoctor($id){
    $doctor = Doctor::findOrFail($id);
    $doctor->delete();
    return redirect()->back();

}
public function updateDoctor($id){
    $doctor = Doctor::findOrFail($id);
    return view('admin.update_doctors', compact('doctor'));

}
public function postUpdateDoctor(Request $request, $id)
{
    $doctor = Doctor::findOrFail($id);

    $doctor->doctors_name = $request->doctors_name;
    $doctor->doctors_phone = $request->doctors_phone;
    $doctor->speciality = $request->speciality;
    $doctor->room_number = $request->room_number;

    if($request->hasFile('doctors_image')){
        $image = $request->doctors_image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $image->move('project_img', $imagename);
        $doctor->doctors_image = $imagename;
    }

    $doctor->save();

    return redirect()->back()->with('doctor_updatemessage','Doctor Updated Successfully');
}
public function viewAppointment(){
    $appointment= Appointment::all();
    return view('admin.view_appointments', compact('appointment'));
}
public function changeStatus(Request $request ,$id){
    $appointment = Appointment::findOrFail($id);

    $appointment ->status=$request->status;
    $appointment->save();
    return redirect()->back();

}

}