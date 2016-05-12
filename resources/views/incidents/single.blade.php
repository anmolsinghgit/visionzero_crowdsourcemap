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

    <div class= 'incident_single'>
        <h5>Concern: {{$incident->type}}</h5>
        <p>My comments: {{$incident->text}}</p>
        <p>Neighborhood: {{$incident->neighborhood}}</p>
        <p>Time Input: {{$incident->created_at}}</p>
        @if ($incident->target_id == 2)
            <img id ="pedestrian"
            src='/images/pedestrian.png'
            alt='pedestrian'
            align="left">
        @elseif ($incident->target_id == 1)
            <img id ="cyclist"
            src='/images/cyclist.png'
            alt='cyclist'
            align="left">
        @elseif ($incident->target_id == 1)
            <img id ="motorist"
            src='/images/motorist.png'
            alt='motorist'
            align="left">
        @endif

        <!-- <a href='/edit/{{$incident->id}}'>Edit</a>
        <a href='/confirm-delete/{{$incident->id}}'>Delete</a><br> -->
    </div>
@stop
