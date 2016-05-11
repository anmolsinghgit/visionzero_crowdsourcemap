
@extends('layouts.master')

@section('title')
    Delete Incident
@stop

@section('content')
    <h1>Delete Incident</h1>
    <p>Are you sure you want to delete <em>{{$incident->type}}</em>?</p>
    <p><a href='/delete/{{$incident->id}}'>Yes...</a></p>
@stop
