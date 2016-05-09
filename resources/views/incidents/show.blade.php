@extends('layouts.master')


@section('title')
    Show all safety concerns
@stop

@section('content')

    @if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <h1> View all safety concerns </h1>

    <div class= 'incidents'>
        @foreach($incidents as $incident)
            <h4>{{$incident->type}}</h4>
        @endforeach
    </div>
@stop
