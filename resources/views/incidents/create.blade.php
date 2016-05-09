@extends('layouts.master')


@section('title')
    Add incident
@stop

@section('content')

    @if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <h1> Add new safety concern </h1>
    <form method ='POST' class='form' action = "/practice">
        {{csrf_field()}}
        <div class = "form-group">
            <label>Latitude:</label>
            <input type ='text'
            id = 'latitude'
            name = 'latitude'
            value = '{{ old('latitude')}}'
            >
            <div class='error'>{{ $errors->first('latitude') }}</div>


        </div>

        <div class = "form-group">
            <label>Longitude:</label>
            <input type ='text'
            id = 'longitude'
            name = 'longitude'
            value = '{{ old('longitude')}}'>

        </div>

        <div class = "form-group">
            <label>Neighborhood:</label>
            <input type ='text'
            id = 'neighborhood'
            name = 'neighborhood'
            value = '{{ old('neighborhood')}}'
            >
             <div class='error'>{{ $errors->first('neighborhood') }}</div>
        </div>

        <div class = "form-group">
            <label>Type:</label>
            <input type ='text'
            id = 'type'
            name = 'type'
            value = '{{ old('type')}}'>

        </div>

        <div class = "form-group">
            <label>Details:</label>
            <textarea class="form-control" type ='text'
            rows= 3
            id = 'text'
            name = 'text'
            value = '{{ old('text')}}'</textarea>
        </div>

        <button type='submit' class='btn btn-primary'>Add incident</button>
    </form>
@stop
