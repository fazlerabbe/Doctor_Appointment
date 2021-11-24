<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public  function upload(Request $request)
    {
        $doctor=new doctor;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;
        $doctor->name=$request->name;
        $doctor->number=$request->number;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;
        

        #echo($request);
        $doctor->save();
        return redirect()->back()->with('message','Doctor added successfully');

        
    }
    public function showappointment()
        {
            $data=appointment::all();
            return view('admin.showappointment',compact('data'));
        }

    public function approved($id)
    {
        $data=appointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back();
    } 
    
    
    public function canceled($id)
    {
        $data=appointment::find($id);
        $data->status='canceled';
        $data->save();
        return redirect()->back();
    }   
}