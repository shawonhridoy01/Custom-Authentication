<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    // login view
    public function login(){
        return view('auth.login');
    }

    //registration view
    public function registration(){
        return view('auth.registration');
    }

    // registration logic
    public function registrationUser(Request $request){

        $request->validate([
            'first_name' => 'required|min:5|max:100',
            'last_name' => 'required|min:5|max:100',
            'email' => 'required|min:5|max:100|unique:users',
            'password' => 'required|min:5|max:12',
        ]);
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $isSave = $user->save();

        if($isSave){
            // return redirect('dashboard')->with('success',"Your Registration Has Been Successfully");
            return redirect('login')->with('success',"Your Registration Has Been Successfully");
        }else{
            return redirect('/registration')->with('fail',"Your Registration Has Been Successfully");
        }
    }


    public function dashboard(){
        $data = array();
        if(Session::has('loggedIn')){
            $data = User::where('id','=',Session::get('loggedIn'))->first();
            return view('dashboard',compact('data'));
        }
    }


    public function loginUser(Request $request){

        $request->validate([
            'email' => 'required|min:5|max:100',
            'password' => 'required|min:5|max:12',
        ]);


        $userEmail = User::where('email','=',$request->email)->first();

        if($userEmail){
            if(Hash::check($request->password,$userEmail->password)){
                $request->session()->put('loggedIn',$userEmail->id);
                return redirect('dashboard');

            }else{
                return back()->with('password_error',"Your Password Does not matched");
            }
        }else{
            return back()->with('email_error',"User Email is Not Registered or Invalied");

        }
    }


    public function logout(){
        if(Session::has('loggedIn')){
            Session::pull('loggedIn');
            return redirect('login');
        }
    }

}
