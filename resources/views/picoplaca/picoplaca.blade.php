@extends('layout')

@section('content')
    <div class="row">
        @if(is_object($result))
            <div class="alert alert-{{ $result->type }}">
                {{ $result->message }}
            </div>
            <div>
                {{ print_r($result) }}
            </div>
        @endif
    </div>

    <div class="row">
        <form action="/verify" method="post">
            <div class="form-group">
                <label for="license">License</label>
                <input type="text" name="license" id="license" class="form-control" placeholder="ABC1234" required>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="time">Hour</label>
                <input type="number" name="time" id="time" min="0" max="23" class="form-control" placeholder="0 to 23"
                       required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default">
                    Submit
                </button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
    <hr>

    <div class="row">
        <a href="{{ action("PagesController@home") }}" class="btn btn-default">Back to Home</a>
    </div>

@stop
