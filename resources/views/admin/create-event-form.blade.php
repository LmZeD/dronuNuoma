@extends('layouts.master')

@section('content')
    <form class="form-horizontal" action="{{route('admin.createEvent.submit')}}" method="post">
        <fieldset>
        {{ csrf_field() }}
        <!-- Form Name -->
            <legend>Sukurti naują renginį</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Renginio pavadinimas</label>
                <div class="col-md-4">
                    <input id="name" name="name" value="{{old('name')}}"type="text" placeholder="Naujas renginys" class="form-control input-md" required="">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="address">Adresas</label>
                <div class="col-md-4">
                    <input id="address" name="address" value="{{old('address')}}" type="text" placeholder="Adresas" class="form-control input-md" required="">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="description">Aprašymas</label>
                <div class="col-md-4">
                    <input id="description" name="description" value="{{old('description')}}"type="text" placeholder="Aprašymas" class="form-control input-md" required="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="date_form">Renginio pradžia</label>
                <div class="col-md-4">
                    <input id="date_form" name="date_form" value="{{old('date_form')}}"type="date" placeholder="Aprašymas" class="form-control input-md" required="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="date_to">Renginio pabaiga</label>
                <div class="col-md-4">
                    <input id="date_to" name="date_to" value="{{old('date_to')}}"type="date" placeholder="Aprašymas" class="form-control input-md" required="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
                    <button id="submit" name="submit" class="btn btn-success">Pateikti</button>
                </div>
            </div>

        </fieldset>
    </form>
@endsection
