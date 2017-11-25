@extends('layouts.master')

@section('title')
    Mano produktai
@endsection

@section('content')
    <h1>Mano produktai</h1>

    @if($products->count() == 0)
        <p class="alert alert-success">Jūs dar neturite pirdėję prekių!</p>
        <a href="{{route('customer.getAddProductForm')}}" class="btn btn-default">Pridėti prekę</a>
    @endif
        @foreach($products->chunk(3) as $productsChunk)
            <div class="row">
                @foreach($productsChunk as $product)
                    <div class="col-sm-2 col-md-4">
                        <div class="thumbnail">
                            <a href="#" class="">
                                @if($product->src != null)
                                    <img src='{{url('/uploads/'.$product->src)}}' alt="..." class="img-responsive align-content-center">
                                @else
                                    <img src='{{url('/uploads/DNlogoWHITE.png')}}' alt="..." class="img-responsive align-content-center">
                                @endif
                                    <div class="caption">
                                    <h3 class="text-center">{{$product -> name}}</h3>
                                    <p class="text-center">{{$product -> description}}</p>
                                    <p class="text-center">{{$product -> price}} €/h</p>
                                    <a href="{{route('customer.getUpdateProductForm',['id' => $product->product_id] )}}" class="btn btn-success"> Redaguoti </a>
                                    <a href="{{route('customer.deleteProduct.submit',['id' => $product->product_id] )}}" class="btn btn-danger"> Šalinti </a>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

@endsection

