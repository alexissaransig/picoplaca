@extends('layout')

@section('content')
    <div class="text-center">
        <p>Please, select an option</p>
        <div class="wrapper">
            <a href="{{ action("PicoPlacaController@picoplaca") }}" class="btn btn-default">Check my license</a>
            <a href="{{ action("ScheduleController@schedule") }}" class="btn btn-default">See schedule</a>
        </div>
    </div>
@stop