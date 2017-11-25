@extends('layouts.master')

@section('title')
    Shop
@endsection

@section('content')
    <h1>Nuomos forma</h1>
    <form class="form-horizontal" action="#" method="get"> <!-- Apmokėjimai nulems routą ir parametrus kuriuos perduosiu -->
        <fieldset>
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-md-4 control-label" for="from_date_available">Nuomos laikotarpis (nuo pasirinktos dienos)</label>
                <div class="col-md-4">
                    <input id="from_date_available" name="from_date_available" value="{{old('from_date_available')}}" type="date" class="form-control input-md" required="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="to_date_available">Nuomos laikotarpis (iki pasirinktos dienos)</label>
                <div class="col-md-4">
                    <input id="to_date_available" name="to_date_available" value="{{old('to_date_available')}}" type="date" class="form-control input-md" required="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="product_type">Nuomos punktas</label>
                <div class="col-md-4">
                    <select id="product_type" name="product_type" class="form-control">
                        <option value="-1">Pasirinkite</option>
                        @foreach($addresses as $address)
                            <option value="{{$address->address_id}}">{{$address->street}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
                    <button id="submit" name="submit" class="btn btn-success">Į apmokėjimą</button>
                </div>
            </div>
        </fieldset>
    </form>
@endsection

