@extends('layouts.master')

@section('title')
    Nuomos ataskaita
@endsection

@section('content')
    <h1 style="padding-bottom: 10px; padding-top: 20px;">Detali nuomos ataskaita (<strong>{{$date_from}} - {{$date_to}}</strong>)</h1>
    <hr>
    @foreach($products as $product)
        <p><strong>{{$product->name}}:</strong> ({{$product->price}}€/h) Būsena: <strong>
            {{App\Http\Controllers\NuomaController::getStateByProductStatusId($product->product_status_product_status_id)}}</strong></p>
        <p>Prekė priklauso  (id: <strong>{{$product->customer_id}}</strong>): {{$product->first_name}} {{$product->last_name}}</p>
        <hr>
    @endforeach


@endsection



