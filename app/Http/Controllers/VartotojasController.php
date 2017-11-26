<?php

namespace App\Http\Controllers;

use App\Address;
use App\Event;
use App\Mail\SingleMail;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Auth;
use Session;

class VartotojasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer',['except' => ['logout']]);
    }

    public function logout(){
        $user=auth()->user();
        Auth::logout($user);
        Session::flush();
        return redirect()->route('home');
    }

    public function getCustomerProfile(){
        if(Auth::guard('customer')) {
            $user = Auth::user();
            return view('customer.profile', ['user' => $user]);
        }else
            return redirect(route('customer.login'));
    }

    public function getAdminIndex(){//returns index page
        $user=auth()->user();
        $customer=DB::table('customer')->
        select('customer_status_customer_status_id')->
        where('customer_id',$user->customer_id)->get();

        if($customer[0]->customer_status_customer_status_id==9257999){
            return view('admin.index');
        }
        return redirect(route('home'));
    }

    public function getAddShopForm(){
        $user=auth()->user();
        if($user->customer_status_customer_status_id ==9257999){
            return view('admin.add-shop-form');
        }
        return redirect(route('home'));

    }

    public function postAddShopForm(Request $request){

        $user=auth()->user();
        if($user->customer_status_customer_status_id ==9257999) {
            Address::create([
                'street' => $request['address'],
                'zip' => $request['zip'],
                'customer_customer_id' => $user->customer_id,
                'address_type_address_type_id' => '2',
            ]);
            return redirect()->route('admin.index')->with('success','Pridėta!');
        }
        return redirect(route('home'));
    }

    public function getSendMailForm(){

        $user=auth()->user();
        if($user->customer_status_customer_status_id ==9257999) {
            return view('admin.single-mail-form');
        }
        return redirect(route('home'));
    }

    public function postSendMailForm(Request $request,Mailer $mailer){

        $user=auth()->user();
        if($user->customer_status_customer_status_id ==9257999) {

            $mailer->to($request->input('email'))
                ->send(new SingleMail($request->input('title')));
            return redirect()->route('admin.index')->with('success','Išsiųsta!');
        }
        return redirect(route('home'));
    }

    public function getCreateEventForm(){
        $user=auth()->user();
        if($user->customer_status_customer_status_id ==9257999) {
            return view('admin.create-event-form');
        }
        return redirect(route('home'));
    }

    public function postCreateEventForm(Request $request){
        $user=auth()->user();
        if($user->customer_status_customer_status_id ==9257999) {
            Event::create([
                'description' =>$request['description'],
                'name' => $request['name'],
                'address' => $request['address'],
                'event_starts_at' => $request['date_form'],
                'event_ends_at' => $request['date_to'],
            ]);
            return redirect()->route('admin.index')->with('success','Sukurta!');
        }
        return redirect(route('home'));
    }

    public function getEvents(){
        $mytime=Carbon::now();
        $events=Event::where('event_starts_at','>=',$mytime->toDateString())->get();
        return view('events.index',['events'=>$events]);
    }
}
