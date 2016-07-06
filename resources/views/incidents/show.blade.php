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
    <h3> View my safety concerns </h3>

    @if(sizeof($incidents) == 0)
    You have not added any safety concerns.
    @else


    <div class= 'incidents'>
        @foreach($incidents as $incident)


                @if ($incident->target_id == 2)
                    <img id ="pedestrian_small"
                    src='/images/pedestrian.png'
                    alt='pedestrian'
                    align="left">
                @elseif ($incident->target_id == 1)
                    <img id ="cyclist_small"
                    src='/images/cyclist.png'
                    alt='cyclist'
                    align="left">
                @elseif ($incident->target_id == 3)
                    <img id ="motorist_small"
                    src='/images/motorist.png'
                    alt='motorist'
                    align="left">
                @endif
            <h4>{{$incident->type}}</h4>
            <input type= "hidden" id ="test" value= "{{$incident->latitude}}"></>
            <p>{{$incident->text}}</p>
            <a class='links'href='/edit/{{$incident->id}}'>Edit</a>
            <a class='links'href='/confirm-delete/{{$incident->id}}'>Delete</a>
            <a class='links'href ='/show/{{$incident->id}}'>More info </a>
            <br>
        @endforeach
    </div>

        @endif
@stop
