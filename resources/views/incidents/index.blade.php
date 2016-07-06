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

    <div class= 'incidents_index'>
        @foreach($incidents as $incident)
            @if ($incident->target_id == 2)
            <a href='/show/{{$incident->id}}'>
            <img align="left" id ="pedestrian_small"border="0" src='/images/pedestrian.png'></a>
            @elseif ($incident->target_id == 1)
            <a href='/show/{{$incident->id}}'>
            <img align="left" id ="cyclist_small"border="0" src='/images/cyclist.png'></a>
            @else ($incident->target_id == 3)
            <a href='/show/{{$incident->id}}'>
            <img align="left" id ="motorist_small"border="0" src='/images/motorist.png'></a>
            @endif

                <h4>Concern: {{$incident->type}}</h4>
                <p>Comment: {{$incident->text}}</p>

                <a class='links'href ='/show/{{$incident->id}}'>More info </a>
                <br>
            <!-- <a href='/edit/{{$incident->id}}'>Edit</a>
            <a href='/confirm-delete/{{$incident->id}}'>Delete</a><br> -->
        @endforeach
        <!-- <div class ="hidden_markers">
            <input type="hidden" class="hidden_lat" value= '{{$incidents}}'></>
            <input type="hidden" class="hidden_long" value= '{{$incidents}}'></>
        </div> -->
    </div>
@stop
