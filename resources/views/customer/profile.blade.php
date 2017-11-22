@extends('layouts.master')

@section('title')
    Mano profilis
@endsection

@section('content')

<div class="container">
<h1>Hello</h1>
    <p class="alert alert-success">{{Session::get('success')}}</p>
</div>




@include('partials.side-menu')
@endsection

