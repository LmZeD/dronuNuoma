@extends('layouts.master')

@section('title')
    Mano produktai
@endsection

@section('content')
    <h1>Mano produktai</h1>
    @foreach($products->chunk(3) as $productsChunk)
        <div class="row">
            @foreach($productsChunk as $product)
                <div class="col-sm-2 col-md-4">
                    <div class="thumbnail">
                        <a href="#" class="">
                            <img src=https://images-na.ssl-images-amazon.com/images/I/911tiQulnWL._SY355_.jpg alt="..." class="img-responsive align-content-center">
                            <div class="caption">
                                <h3 class="text-center">{{$product -> name}}</h3>
                                <p class="text-center">{{$product -> description}}</p>
                                <p class="text-center">{{$product -> price}} €/h</p>
                                <a href="#" class="btn btn-success"> Redaguoti </a>
                                <a href="#" class="btn btn-danger"> Šalinti </a>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

@endsection

