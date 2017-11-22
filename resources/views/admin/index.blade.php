@extends('layouts.master')

@section('title')
    Profile
@endsection

@section('content')
   <div class="container">
        <h1>ADMIN</h1>
       <a href="{{route('admin.getAddShopForm')}}" class="btn btn-default">Nustatyti nuomos punktą</a>
   </div>

@endsection

