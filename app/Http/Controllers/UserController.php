<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class UserController extends Controller
{

    public function logout(){
        Auth::guard('customer')->logout();
        Auth::logout();
        Session::flush();
        return redirect('home');
    }
}
