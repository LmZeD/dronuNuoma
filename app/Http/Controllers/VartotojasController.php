<?php

namespace App\Http\Controllers;

use App\Address;
use App\Customer;
use App\Message;
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
        $this->middleware('auth:customer',['except' => ['logout','getEvents']]);
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

    public function getCreateMessageForm(){
        if(Auth::guard('customer')) {
              return view('customer.create-message-form');
        }
        return redirect(route('home'));
    }

    public function postCreateMessageForm(Request $request){
        if(Auth::guard('customer')) {
            $user=Auth::user();
            $mytime=Carbon::now();
            Message::create([
                'customer_id' =>$user->customer_id,
                'message' => $request['message'],
                'created_at'=> $mytime->toDateTimeString(),
            ]);
            return redirect(route('customer.getProfile'))->with('success','Išsiųsta!');
        }
        return redirect(route('home'));
    }

    public function getUserSummary(){
        $user=auth()->user();
        if($user->customer_status_customer_status_id ==9257999) {
            //today
            $mytime = Carbon::now();
            $userUpdatesToday=Customer::where('updated_at',$mytime->toDateString())->count();
            $userCreatesToday=Customer::where('created_at',$mytime->toDateString())->count();
            //end of today
            //this week
            $startOfWeek = $mytime->startOfWeek();
            $userUpdatesThisWeek=Customer::where('updated_at','>=',$startOfWeek->toDateString())->count();
            $userCreatesThisWeek=Customer::where('created_at','>=',$startOfWeek->toDateString())->count();

            //end of this week
            //this month
            $mytime = Carbon::now();
            $startOfMonth = $mytime->startOfMonth();
            $userUpdatesThisMonth=Customer::where('updated_at','>=',$startOfMonth->toDateString())->count();
            $userCreatesThisMonth=Customer::where('created_at','>=',$startOfMonth->toDateString())->count();

            //end of this month
            //this year
            $mytime = Carbon::now();
            $startOfYear = $mytime->startOfYear();
            $userUpdatesThisYear=Customer::where('updated_at','>=',$startOfYear->toDateString())->count();
            $userCreatesThisYear=Customer::where('created_at','>=',$startOfYear->toDateString())->count();

            //end of this year

            $totalCount=Customer::all()->count();

            return view('admin.user-summary',['userUpdatesToday'=>$userUpdatesToday,
                'userUpdatesThisWeek'=>$userUpdatesThisWeek,'userUpdatesThisMonth'=>$userUpdatesThisMonth,
                'userUpdatesThisYear'=>$userUpdatesThisYear, 'userCreatesToday'=>$userCreatesToday,
                'userCreatesThisWeek'=>$userCreatesThisWeek,'userCreatesThisMonth'=>$userCreatesThisMonth,
                'userCreatesThisYear'=>$userCreatesThisYear,'totalCount'=>$totalCount]);
        }
        return redirect(route('home'));
    }
}
