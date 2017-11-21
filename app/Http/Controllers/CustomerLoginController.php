<?php

namespace App\Http\Controllers;

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
        return view('login.login');
    }

    public function validationLogin($request){
        return $this->validate($request, [
            'email' => 'required|max:255|email',
            'password' => 'required|min:6'
        ]);
    }

    public function login(Request $request){
        $this->validationLogin($request);

        if(Auth::guard('customer')->attempt(['email' => $request->email, 'password'=> $request->password], false)){
            return redirect()->intended(route('home'));
        }else{
            return redirect()->route('customer.login')->with('Failed','User Does Not Exist');
        }
    }
    //--------------------------------------------------------
}
