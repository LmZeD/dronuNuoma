<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Gender;
use Auth;

class CustomerRegisterController extends Controller
{

    //Registration
    public function showRegisterForm(){
        $genders=Gender::all();
        return view('login.register',['genders'=>$genders]);
    }

    public function register(Request $request){
        $this->validation($request);

        Customer::create([
            'first_name' => $request['fname'],
            'last_name' => $request['lname'],
            'birth_date' => $request['birth_date'],
            'email' => $request['email'],
            'phone' => $request['contact'],
            'gender_id' => $request['gender'],
            'password' => bcrypt($request['password']),
        ]);

        if(Auth::guard('customer')->attempt(['email' => $request->email, 'password'=> $request->password], false)){
            return redirect()->intended(route('home'));
        }else{
            return redirect()->route('customer.login')->with('Failed','User Does Not Exist');
        }
    }

    public function validation($request){
        return $this->validate($request, [
            'email' => 'required|max:255|email|unique:customer',
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'password' => 'required|min:6|confirmed'
        ]);
    }
    //-----------------------------------------------------------
}
