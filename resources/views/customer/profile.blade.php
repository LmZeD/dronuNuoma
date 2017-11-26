@extends('layouts.master')

@section('title')
    Mano profilis
@endsection

@section('content')
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <div class="nav-side-menu">
        <div class="brand">Meniu</div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">
                <li>
                    <a href="{{route('home')}}">
                        <i class="fa fa-home" aria-hidden="true"></i> Dronų nuoma
                    </a>
                </li>

                <li data-toggle="collapse" data-target="#new" class="collapsed">
                    <a href="#"><i class="fa fa-car fa-lg"></i> Prekės <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                    <li><a href="{{route('customer.getAddProductForm')}}">Pridėti prekę</a></li>
                    <li><a href="{{route('customer.getCustomerProducts')}}">Mano prekės</a></li>
                    <li><a href="{{route('customer.getCreateMessageForm')}}">Žinutė administratoriui</a></li>
                </ul>

            </ul>
        </div>
    </div>
    <link rel="stylesheet" href="{{URL::to('css/side-menu.css')}}">


    <div class="container">
    <h1>Mano profilis</h1>
    @if(session('success'))
        <p class="alert alert-success">{{session('success')}}</p>
        {{session()->forget('success')}}
    @endif
        @if(session('fail'))
            <p class="alert alert-danger">{{session('fail')}}</p>
            {{session()->forget('fail')}}
        @endif
</div>





@endsection

@section('styles')
    <link rel="stylesheet" href="{{URL::to('css/profile-index.css')}}">
@endsection