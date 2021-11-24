<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use DB;



class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $doctor=doctor::all();
                return view('user.home',compact('doctor'));
            }
            else{
                return view('admin.home');
            }

        }
        else{
            return redirect()->back();
        }
    }
    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }
        else{
            $doctor=doctor::all();
            return view('user.home',compact('doctor'));

         }
        
    }
    public function appointment (Request $request)
        {
            $date= array();
            $data['name']=$request->name;
            $data['email']=$request->email;
            $data['date']=$request->date;
            $data['phone']=$request->number;
            $data['message']=$request->message;
            $data['doctor']=$request->doctor;
            $data['status']='In progress';

            #echo($request);
            
            if(Auth::id())
            {
                $data['user_id']=Auth::user()->id;
                #$data->user_id=Auth::user()->id;  
            }
            $database=DB::table('appointments')->insert($data);
           

            // $data->name=$request->name;
            // $data->email=$request->email;
            // $data->date=$request->date;   
            // $data->message=$request->message;   
            // $data->doctor=$request->doctor;   
            // $data->status='In progress';
            // echo($data);

            
            // if(Auth::id())
            // {
            //     $data->user_id=Auth::user()->id;  
            // }
            
            // $data->save(); 

            return redirect()->back()->with('message','Appointment Request successful.We will contact with you soon');

        }

        public function myappointment()
        {
            if(Auth::id())
            {
                $userid=Auth::user()->id;
                $appoint=appointment::where('user_id',$userid)->get();
                return view('user.my_appointment',compact('appoint'));
            }
            
            else{
                return redirect()->back();
            }
        }

        public function cancel_appoint($id)
        {
            $data=appointment::find($id);
            $data->delete();
            return redirect()->back();

        }
}