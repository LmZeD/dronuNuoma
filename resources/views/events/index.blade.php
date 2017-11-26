@extends('layouts.master')

@section('title')
    Renginiai
@endsection

@section('content')
    <h1>Renginiai</h1>
    @foreach($events->chunk(3) as $eventsChunk)
        <div class="row">
            @foreach($eventsChunk as $event)
                <div class="col-sm-2 col-md-4">
                    <div class="thumbnail">
                        <img src="{{url('/uploads/DNlogoWHITE.png')}}" alt="Image">
                        <p><strong>{{$event->name}}</strong></p>
                        <p>{{$event->description}}</p>
                        <p>nuo {{$event->event_starts_at}} iki {{$event->event_ends_at}})</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

@endsection

