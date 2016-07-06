@extends('layouts.master')

@if(Session::get('flash_message') != null))
<div class='flash_message'>{{ Session::get('flash_message') }}</div>
@endif

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
    <form method ='POST' class='form-horizontal save-form' id='form_' onsubmit='myFunction();' action = "/create">
        {{csrf_field()}}
        <div class = "form-group">
            <!-- <label>Latitude:</label> -->
            <input type ='hidden'
            id = 'lat_form'
            name = 'latitude'
            value = '{{ old('latitude', '42.367280')}}'
            >
            <div class='error'>{{ $errors->first('latitude') }}</div>

        </div>

        <div class = "form-group">
            <!-- <label>Longitude:</label> -->
            <input type ='hidden'
            id = 'long_form'
            name = 'longitude'
            value = '{{ old('longitude','-71.0650312')}}'
            >
            <div class='error'>{{ $errors->first('longitude') }}</div>

        </div>

        <div class = "form-group">
            <label for ='neighborhood'>Neighborhood:</label>
            <select name="neighborhood" id='neighborhood'>
                @foreach($neighborhoods_for_dropdown as $id=>$neighborhood)
                    <option value='{{$neighborhood}}'>
                        {{$neighborhood}}
                    </option>
                @endforeach
            </select>

             <div class='error'>{{ $errors->first('neighborhood') }}</div>
        </div>

        <div class = "form-group">
            <label>Type:</label>
            <select name="type" id='type'>
                @foreach($types_for_dropdown as $id=>$type)
                    <option value='{{$type}}'>
                        {{$type}}
                    </option>
                @endforeach
            </select>
            <div class='error'>{{ $errors->first('type') }}</div>

        </div>


        <div class = "form-group">
            <label>Details:</label>
            <textarea rows="4" cols="50" class="form-control"
            type='text'
            cols= "20"
            rows = '3'

            id = 'text'
            name = 'text'
            value = '{{ old('text', 'Need bike lanes or cycle tracks on Nashua St, especially northbound')}}'> </textarea>
            <div class='error'>{{ $errors->first('text') }}</div>
        </div>

        <div class = "form-group">
            <label for = "target_id">Target:</label>
            <select name="target_id" id='target_id'>
                @foreach($targets_for_dropdown as $target_id=>$mode)
                    <option value='{{$target_id}}'>
                        {{$mode}}
                    </option>
                @endforeach
            </select>
            <div class='error'>{{ $errors->first('target_id') }}</div>
        </div>


        <button type='submit' class="sForm" class='btn btn-primary'>Add incident</button>
    </form>

    <!-- Button to go into edit mode -->
    <div class="draw-button">
        <span id="edit-button" class="btn " onclick="boston.toggleEditMode()"><i class="icon-pencil"></i> Let me draw on this map</span>
    </div>
@stop


@section('page-script')
<script type="text/javascript">

 // function myFunction(){
 //        $.ajax({
 //                type: "POST",
 //
 //                url: "http://localhost/create",
 //                data: {
 //                    lat:lat,
                        long:long
 //                },
 //                cache: false,
 //                success: function(data) {
 //                     alert(data);
 //                 }
 //         });
 //          event.preventDefault();
 //         return false;
 //
 //     }
</script>
@stop
