<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CustomerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:customer');
    }

    //Login
    public function showLoginForm(){
        return view('login.customer-login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('customer')->attempt(['email' => $request->email, 'password'=> $request->password], false)){
            return redirect()->route('customer.getProfile')->with('Success','Success');
        }else{
            return redirect()->route('customer.login');
        }
    }
    //--------------------------------------------------------
}
