@extends('layouts.master')


@section('title')
    Edit incident: {{$incident->type}}
@stop

@section('content')

    @if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <h1> Edit incident: {{$incident->type}}</h1>
    <form method ='POST' class='form' action = "/edit">

        <input type ='hidden' name ='id' value='{{$incident->id}}'>

        {{csrf_field()}}
        <div class = "form-group">
            <label>Latitude:</label>
            <input type ='text'
            id = 'latitude'
            name = 'latitude'
            value = '{{ $incident->latitude }}'
            >
            <div class='error'>{{ $errors->first('latitude') }}</div>

        </div>

        <div class = "form-group">
            <label>Longitude:</label>
            <input type ='text'
            id = 'longitude'
            name = 'longitude'
            value = '{{ $incident->longitude}}'
            >
            <div class='error'>{{ $errors->first('longitude') }}</div>

        </div>

        <div class = "form-group">
            <label for ='neighborhood'>Neighborhood:</label>
            <select name="neighborhood" id='neighborhood'>
                @foreach($neighborhoods_for_dropdown as $id=>$neighborhood)

                    <option value='{{$neighborhood}}'{{($incident->id == $id)? 'SELECTED': ''}}>
                        {{$neighborhood}}
                    </option>
                @endforeach
            </select>
            <!-- <input type ='text'
            id = 'neighborhood'
            name = 'neighborhood'
            value = '{{ $incident->neighborhood}}'
            > -->
             <div class='error'>{{ $errors->first('neighborhood') }}</div>
        </div>

        <div class = "form-group">
            <label>Type:</label>
            <select name="type" id='type'>
                @foreach($types_for_dropdown as $id=>$type)

                    <option value='{{$type}}'{{($incident->id == $id)? 'SELECTED': ''}}>
                        {{$type}}
                    </option>
                @endforeach
            </select>

        </div>


        <div class = "form-group">
            <label>Details:</label>
            <input class="form-control"
            type='text'
            cols= "20"
            rows = '3'
            id = 'text'
            name = 'text'
            value = '{{ $incident->text}}'>

            <div class='error'>{{ $errors->first('text') }}</div>
        </div>

        <button type='submit' class='btn btn-primary'>Save changes</button>
    </form>
@stop
