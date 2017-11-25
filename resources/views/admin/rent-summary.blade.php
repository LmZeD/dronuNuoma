@extends('layouts.master')

@section('title')
    Nuomos ataskaita
@endsection

@section('content')
<h1 style="padding-bottom: 20px;">Nuomos ataskaita</h1>
<hr>
<p>Viso prekių:<strong> {{$totalCount}} </strong>(iš jų nuomuojami: <strong>{{$inRentCount}}</strong>
            blokuojami: <strong>{{$blockedCount}}</strong>)</p>
<hr>
<p><strong>Aktyvumo lentelė</strong></p>
<table class="table">
    <thead>
    <tr>
        <th>Laikotarpis</th>
        <th>Atnaujintų prekių kiekis</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Šiandien</td>
        <td>{{$droneUpdatesToday}}</td>
    </tr>
    <tr>
        <td>Ši savaitė</td>
        <td>{{$droneUpdatesThisWeek}}</td>
    </tr>
    <tr>
        <td>Šis mėnuo</td>
        <td>{{$droneUpdatesThisMonth}}</td>
    </tr>
    <tr>
        <td>Šie metai</td>
        <td>{{$droneUpdatesThisYear}}</td>
    </tr>
    </tbody>
</table>

<hr>

<p><strong>Detali ataskiata</strong></p>
<form class="form-horizontal" action="{{route('admin.getRentSummaryDetails')}}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label class="col-md-4 control-label" for="date_from">Laikotarpis (nuo pasirinktos dienos)</label>
        <div class="col-md-4">
            <input id="date_from" name="date_from" value="{{old('date_from')}}" type="date" class="form-control input-md" required="">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label" for="date_to">Laikotarpis (iki pasirinktos dienos)</label>
        <div class="col-md-4">
            <input id="date_to" name="date_to" value="{{old('date_to')}}" type="date" class="form-control input-md" required="">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label" for="submit"></label>
        <div class="col-md-4">
            <button id="submit" name="submit" class="btn btn-success">Pateikti</button>
        </div>
    </div>
</form>

<hr>

@endsection



