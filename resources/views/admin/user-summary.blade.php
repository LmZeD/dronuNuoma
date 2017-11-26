@extends('layouts.master')

@section('title')
    Vartotojų ataskaita
@endsection

@section('content')
    <h1 style="padding-bottom: 20px;">Vartotojų ataskaita</h1>
    <hr>
    <p>Viso vartotojų:<strong> {{$totalCount}} </strong></p>
    <hr>
    <p><strong>Aktyvumo lentelė</strong></p>
    <table class="table">
        <thead>
        <tr>
            <th>Laikotarpis</th>
            <th>Vartotojų profilių atnaujinimų kiekis</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Šiandien</td>
            <td>{{$userUpdatesToday}}</td>
        </tr>
        <tr>
            <td>Ši savaitė</td>
            <td>{{$userUpdatesThisWeek}}</td>
        </tr>
        <tr>
            <td>Šis mėnuo</td>
            <td>{{$userUpdatesThisMonth}}</td>
        </tr>
        <tr>
            <td>Šie metai</td>
            <td>{{$userUpdatesThisYear}}</td>
        </tr>
        </tbody>
    </table>

    <hr>

    <table class="table">
        <thead>
        <tr>
            <th>Laikotarpis</th>
            <th>Naujų vartotojų kiekis</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Šiandien</td>
            <td>{{$userCreatesToday}}</td>
        </tr>
        <tr>
            <td>Ši savaitė</td>
            <td>{{$userCreatesThisWeek}}</td>
        </tr>
        <tr>
            <td>Šis mėnuo</td>
            <td>{{$userCreatesThisMonth}}</td>
        </tr>
        <tr>
            <td>Šie metai</td>
            <td>{{$userCreatesThisYear}}</td>
        </tr>
        </tbody>
    </table>
    <hr>
@endsection



