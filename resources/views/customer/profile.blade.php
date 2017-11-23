@extends('layouts.master')

@section('title')
    Mano profilis
@endsection

@section('content')
    {{ csrf_field() }}
<div class="container">
<h1>Hello</h1>
    @if(session('success'))
        <p class="alert alert-success">{{session('success')}}</p>
    @endif
</div>




@include('partials.side-menu')
@endsection

