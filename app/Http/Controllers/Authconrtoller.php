<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Exam;
use App\Models\Subject;
use Illuminate\support\facades\Hash;
use Illuminate\support\facades\Auth;
use Illuminate\support\facades\session;

class Authconrtoller extends Controller
{
    public function register(){

        return view('register');
    }
    public function userregister(Request $request){

        $request->validate([
            'name'=>'required|min:2',
            'email'=>'email|required|max:100|unique:users',
            'password'=>'required|min:6'

        ]);


        $user =new User;
        $user ->name=$request->name;
        $user ->email=$request->email;
        $user ->password=Hash::make($request->password);
        $user ->save();

        

        return back()->with('message','successfully registerd');


    }


    public function login(){

        return view('login');
    }
    public function userlogin(Request $request){
        $request->validate([
            'email'=>'email|required',
            'password'=>'required'

        ]);

        $usercredential=$request->only('email','password');
        if(Auth::attempt($usercredential)){

                if(Auth::user()->is_admin==1){
                    return redirect('/admin/dashboard');
                }
                else{
                    return redirect('/dashboard');
                }
        }
        else{
            return back()->with('error','Incorrect email or Password ! ');
        }

        
    }

    
    public function dashboard(){

        $exams=Exam::with('subjects')->orderBy('date')->get();
        return view('user.dashboard',compact('exams'));
    }
    public function admindashboard(){

        $subjects=Subject::all();
        return view('admin.dashboard',compact('subjects'));
    }
    public function logout(Request $request){
         
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
