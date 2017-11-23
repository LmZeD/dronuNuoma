@extends('layouts.master')

@section('title')
    Nuomos punktai
@endsection

@section('content')
<div class="container">
    <div class="col-md-6">
        <h1>Nuomos punktai</h1>
        <div style="height:500px; width:500px;">
            {!! Mapper::render()  !!}}
        </div>
    </div>
</div>


@endsection

