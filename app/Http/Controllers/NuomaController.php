<?php

namespace App\Http\Controllers;

use App\Product;
use App\Image;
use App\ProductStatus;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;
use Mapper;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use Auth;
use Session;
use Illuminate\Http\UploadedFile;
use SplFileInfo;
use Illuminate\Support\Facades\File;

class NuomaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer',['except' => ['getShopIndex','setUpMap']]);
    }
    public function getAddProductForm(){
        if(Auth::guard('customer')) {
            $productTypes = ProductType::all();
            return view('customer.add-product-form', ['productTypes' => $productTypes]);
        }
        return redirect(route('customer.login'));
    }

    public function postAddProductForm(Request $request){
        if(Auth::guard('customer')) {
            $user = Auth::User();
            $mytime = Carbon::now();
            //dd($user);
            Product::create([
                'name' => $request['name'],
                'description' => $request['description'],
                'price' => $request['price'],
                'date_available' => $request['date_available'],
                'amount' => $request['amount'],
                'size' => $request['size'],
                'weight' => $request['weight'],
                'product_type_product_type_id' => $request['product_type'],
                'product_status_product_status_id' => '1',
                'customer_customer_id' => $user->customer_id,
                'last_update' =>$mytime->toDateTimeString(),
            ]);
            $productID=DB::table('product')->max('product_id');
            //nuotrauka
            if($request->hasFile('file')){
                $file=$request->file('file');
                $fileType=$request->file('file')->getMimeType();
                if($fileType == 'image/png' && $file->getSize()<10000000)//10Mb
                $name=null;
                $name=$file->getClientOriginalName();
                $file->move('uploads',$name);
                Image::create([
                    'alt' =>'none',
                    'src' =>$name,
                    'product_product_id'=>$productID
                ]);
            }
            //end nuotrauka
            Session::put('success', 'Produktas sėkmingai pridėtas');
            return redirect(route('customer.getProfile'));
        }
        return redirect(route('customer.login'));
    }

    public function getShopIndex(){
        $mytime = Carbon::now();
        $products=Product::where('date_available','>=',$mytime->toDateString())
            ->leftJoin('image','product_id', 'product_product_id')->get();
        $ind=0;
        foreach ($products as $obj){
            if($obj->product_status_product_status_id != 1){
                unset($products[$ind]);
            }
            $ind++;
        }

        return view('shop.index',['products'=>$products]);
    }

    public function getCustomerProducts(){
        if(Auth::guard('customer')) {
            $user = Auth::user();
            $id=$user->customer_id;

            $products = Product::where('customer_customer_id', $id)->select('*')
                ->leftJoin('image','product_id', 'product_product_id')->get();
            return view('customer.my-products', ['products' => $products]);
        }
        return redirect(route('customer.login'));
    }

    public function getUpdateProductForm($id){
        if(Auth::guard('customer')) {
            $user = Auth::user();

            $product = Product::where('product_id', $id)->get()->toArray();

            if($product[0]['customer_customer_id'] != $user->customer_id){
                return redirect(route('customer.getProfile'))->with('fail','Padauža!');
            }

            if ($product != null) {
                $productStatuses = ProductStatus::all();
                $currentProductStatus = ProductStatus::where('product_status_id', $product[0]['product_status_product_status_id'])
                    ->select('name')->get()->toArray();

                return view('customer.update-product-form', ['productStatuses' => $productStatuses,
                    'product' => $product[0], 'currentProductStatus' => $currentProductStatus[0]['name']]);
            }
            return redirect()->route('home');
        }
        return redirect(route('customer.login'));
    }

    public function postUpdateProduct($id,Request $request){
        if(Auth::guard('customer')) {
            $mytime = Carbon::now();
            $product = Product::find($id);

            $product->price = $request['price'];
            $product->amount = $request['amount'];
            $product->date_available = $request['date_available'];
            $product->product_status_product_status_id = $request['product_status_id'];
            $product->last_update=$mytime->toDateTimeString();
            $product->save();

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileType = $request->file('file')->getMimeType();
                if ($fileType == 'image/png' && $file->getSize() < 10000000) {//10Mb

                    $image = DB::table('image')->where('product_product_id', $id)->select('*')->get();

                    if (sizeOf($image) != 0) {
                        if (File::exists('uploads/' . $image[0]->src)) {
                            File::delete('uploads/' . $image[0]->src);
                        }

                        $image = Image::find($image[0]->image_id);

                        $name = null;
                        $name = $file->getClientOriginalName();
                        $image->src = $name;
                        $image->save();
                        $file->move('uploads', $name);
                    }else{
                        $name=null;
                        $name=$file->getClientOriginalName();
                        $file->move('uploads',$name);
                        Image::create([
                            'alt' =>'none',
                            'src' =>$name,
                            'product_product_id'=>$id
                        ]);
                    }

                }
            }


            return redirect(route('customer.getProfile'))->with('success', 'Atlikta!');
        }
        return redirect(route('customer.login'));
    }

    public function getDeleteProduct($id){

        $user=Auth::user();
        if(Auth::guard('customer')) {
            $product = Product::find($id);
            $image = DB::table('image')->where('product_product_id',$id)->get()->toArray();

            if(sizeOf($image) != 0) {
                if(File::exists('uploads/'.$image[0]->src)) {
                    File::delete('uploads/'.$image[0]->src);
                }
            }
            DB::table('image')->where('product_product_id',$id)->delete();

            if ($product->customer_customer_id == $user->customer_id) {
                $product->delete();
                return redirect(route('customer.getProfile'))->with('success', 'Pašalinta!');
            }
            return redirect(route('customer.getProfile'))->with('fail', 'Ką čia darai?');
        }
        return redirect(route('customer.login'));
    }

    public function setUpMap(){
        Mapper::map(
            54.9039245,
            23.957783999999947,
            [
                'zoom'=>16,
                'draggable' => false,
                'marker' =>true,
                'eventAfterLoad'=> 'circleListener(maps[0].shapes[0].circle_0);'
            ]
        );
        return view('shop.map');
    }

    public function getRentPage($id)
    {
        $mytime = Carbon::now();
        $product = Product::where('product_id', $id)->get()->toArray();

        if ($product[0]['product_status_product_status_id'] == 1 &&
                $product[0]['date_available']>=$mytime->toDateString()) {

            $addresses = DB::table('address')->
            select('*')->
            where('address_type_address_type_id', '2')->get();

            return view('shop.rent-page', ['addresses' => $addresses, 'product' => $product[0]]);
        }
        return redirect(route('customer.getProfile'))->with('fail','Šis produktas nepasiekiamas');
    }

    public function sendRentDataToCheckOut($id,Request $request){
        return $request->all();
    }

    public function getRentSummary(){
        if(Auth::check()) {
            $user=Auth::user();
            if($user->customer_status_customer_status_id==9257999){
                //today
                $mytime = Carbon::now();
                $droneUpdatesToday=Product::where('last_update',$mytime->toDateString())->count();

                //end of today
                //this week
                $startOfWeek = $mytime->startOfWeek();
                $droneUpdatesThisWeek=Product::where('last_update','>=',$startOfWeek->toDateString())->count();

                //end of this week
                //this month
                $mytime = Carbon::now();
                $startOfMonth = $mytime->startOfMonth();
                $droneUpdatesThisMonth=Product::where('last_update','>=',$startOfMonth->toDateString())->count();

                //end of this month
                //this year
                $mytime = Carbon::now();
                $startOfYear = $mytime->startOfYear();
                $droneUpdatesThisYear=Product::where('last_update','>=',$startOfYear->toDateString())->count();

                //end of this year

                $totalCount=Product::all()->count();
                $activeCount=Product::where('product_status_product_status_id','1')->count();
                $inRentCount=Product::where('product_status_product_status_id','2')->count();
                $blockedCount=Product::where('product_status_product_status_id','3')->count();

                return view('admin.rent-summary',['droneUpdatesToday'=>$droneUpdatesToday,
                    'droneUpdatesThisWeek'=>$droneUpdatesThisWeek,'droneUpdatesThisMonth'=>$droneUpdatesThisMonth,
                    'droneUpdatesThisYear'=>$droneUpdatesThisYear,'totalCount'=>$totalCount
                    ,'inRentCount'=>$inRentCount,'blockedCount'=>$blockedCount
                    ,'activeCount'=>$activeCount]);
            }
            return redirect(route('customer.getProfile'));
        }
        return redirect(route('customer.login'));
    }

    public function getRentSummaryDetails(Request $request){
        if(Auth::check()) {
            $user = Auth::user();
            if ($user->customer_status_customer_status_id == 9257999) {
                $date_from=$request['date_from'];
                $date_to=$request['date_to'];

                $products=Product::where('last_update','>=',$date_from,'and','last_update','<=',$date_to)->
                leftJoin('customer','customer_customer_id','customer_id')->get();

                return view('admin.rent-summary-details',['products'=>$products,
                    'date_from'=>$date_from,'date_to'=>$date_to]);
            }
            return redirect(route('customer.getProfile'));
        }
        return redirect(route('customer.login'));
    }

    public static function getStateByProductStatusId($id){
        $state=DB::table('product_status')->select('name')->where('product_status_id',$id)
            ->get()->toArray();
        return $state[0]->name;
    }
}
