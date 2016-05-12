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
    <h3> View all safety concerns </h3>

    <div class= 'incidents'>
        @foreach($incidents as $incident)
            <h5>{{$incident->type}}</h5>
            <p>{{$incident->text}}</p>
            <a href='/edit/{{$incident->id}}'>Edit</a>
            <a href='/confirm-delete/{{$incident->id}}'>Delete</a><br>
        @endforeach
    </div>
@stop
