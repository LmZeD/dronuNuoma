@extends('layouts.master')

@section('title')
    Profilis
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
                        <i class="fa fa-home" aria-hidden="true"></i> Home (Customer View)
                    </a>
                </li>


                <li data-toggle="collapse" data-target="#service" class="collapsed">
                    <a href="#"><i class="fa fa-globe fa-lg"></i> Services <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service">
                    <li><a href="{{route('customer.getAddProductForm')}}">Pridėti prekę</a></li>
                    <li><a href="{{route('customer.getCustomerProducts')}}">Mano prekės</a></li>
                    <li><a href="{{route('admin.getAddShopForm')}}">Nustatyti nuomos punktą</a></li>
                    <li><a href="{{route('admin.sendMailForm')}}">Siųsti laišką</a></li>
                    <li><a href="{{route('admin.createEvent')}}">Kurti renginį</a></li>
                    <li><a href="{{route('admin.getRentSummary')}}">Nuomos ataskaita</a></li>
                    <li><a href="{{route('admin.getUserSummary')}}">Vartotojų ataskaita</a></li>
                </ul>

            </ul>
        </div>
    </div>
    <link rel="stylesheet" href="{{URL::to('css/side-menu.css')}}">
    <h1><strong>ADMIN</strong></h1>
    @if(session('success'))
        <p class="alert alert-success">{{session('success')}}</p>
        {{session()->forget('success')}}
    @endif
    @if(session('fail'))
        <p class="alert alert-danger">{{session('fail')}}</p>
        {{session()->forget('fail')}}
    @endif
    <p><strong>Dažnai naudojamos funkcijos</strong></p>
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="padding-top: 20px;">
            <a href="{{route('admin.getAddShopForm')}}" class="buttonAdm">Nustatyti nuomos punktą</a>
            <a href="{{route('admin.createEvent')}}" class="buttonAdm">Kurti renginį</a>
        </div>
        <div class="col-md-8 col-md-offset-2" style="padding-top: 20px;">
            <a href="{{route('admin.getRentSummary')}}" class="buttonAdm">Nuomos ataskaita</a>
            <a href="{{route('admin.getUserSummary')}}" class="buttonAdm">Vartotojų ataskaita</a>
        </div>
    </div>




@endsection
@section('styles')
    <link rel="stylesheet" href="{{URL::to('css/profile-index.css')}}">
@endsection


