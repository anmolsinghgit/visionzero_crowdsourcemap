@extends('layouts.master')


@section('title')
    Show safety concern
@stop

@section('content')



    @if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <h1> View this safety concern</h1>

    <div class= 'incident'>

            <h4>{{$incident->type}}</h4>
            <p>{{$incident->text}}</p>
            <a href='/edit/{{$incident->id}}'>Edit</a>
            <a href='/confirm-delete/{{$incident->id}}'>Delete</a><br>

    </div>
@stop
