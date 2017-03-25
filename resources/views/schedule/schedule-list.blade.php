@extends('layout')

@section('content')

    <div class="row">
        <h1>Schedule</h1>

        <h3>Hours</h3>

        <ul>
            @foreach($hours as $item)
                <li><strong>{{ $item[0] }}:00</strong> to <strong>{{ $item[1] }}:00</strong></li>
            @endforeach
        </ul>

        <h3>Days and license plate</h3>

        <ul>
            @foreach($days as $day => $license)
                <li>
                    <strong>{{$day}}: {{ $license[0] }}</strong> and <strong>{{ $license[1] }}</strong>
                </li>
            @endforeach
        </ul>
    </div>
    <hr>
    <a href="{{ action("PagesController@home") }}" class="btn btn-default">Back to Home</a>

@stop
