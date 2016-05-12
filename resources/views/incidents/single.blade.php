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

    @if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <div class= 'incident'>
        <h5>{{$incident->type}}</h5>
        <p>{{$incident->text}}</p>
        <p>{{$incident->neighborhood}}</p>
        <p>{{$incident->target_id}}</p>

        @if ($incident->target_id == 2)
            <p>yo</p>
        @elseif ($incident->target_id == 1)
            <p>sup</p>

        @elseif ($incident->target_id == 1)
            <p>sup</p>
        @endif

        <!-- <a href='/edit/{{$incident->id}}'>Edit</a>
        <a href='/confirm-delete/{{$incident->id}}'>Delete</a><br> -->
    </div>
@stop
