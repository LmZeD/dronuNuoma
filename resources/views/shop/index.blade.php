@extends('layouts.master')

@section('title')
    Parduotuvė
@endsection

@section('content')
<h1>Shop</h1>
@foreach($products->chunk(3) as $productsChunk)
    <div class="row">
        @foreach($productsChunk as $product)
            <div class="col-sm-2 col-md-4">
                <div class="thumbnail">
                    <a href="{{route('customer.getRentPage',['id'=>$product['product_id']])}}" class="">
                        <img src=https://images-na.ssl-images-amazon.com/images/I/911tiQulnWL._SY355_.jpg alt="..." class="img-responsive align-content-center">
                        <div class="caption">
                            <h3 class="text-center">{{$product -> name}}</h3>
                            <p class="text-center">{{$product -> description}}</p>
                            <p class="text-center">{{$product -> price}} €/h</p>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endforeach

@endsection

