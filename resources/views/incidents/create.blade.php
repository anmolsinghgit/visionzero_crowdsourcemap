@extends('layouts.master')


@section('title')
    Add book
@stop

@section('content')

    @if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <h1> Add new book </h1>
    <form method ='POST' action = "/practice">
        {{csrf_field()}}
        <div class = "form-group">
            <label>Title</label>
            <input type ='text'
            id = 'title'
            name = 'title'>
        <button type='submit' class='btn btn-primary'>Add book</button>
        </div>
    </form>
@stop
