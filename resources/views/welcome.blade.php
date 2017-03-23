@extends('layout')

@section('content')
    <div class="center">
        <p>Please, select an option</p>
        <div class="wrapper">
            <a href="{{ action("ScheduleController@schedule") }}" class="button">See schedule</a>
            <a href="{{ action("ScheduleController@schedule") }}" class="button">See schedule</a>
        </div>
    </div>
@stop