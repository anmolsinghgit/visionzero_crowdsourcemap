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
    <form method ='POST' class='form-horizontal save-form' id='form_' onsubmit='myFunction();' action = "/create">
        {{csrf_field()}}
        <div class = "form-group">
            <label>Latitude:</label>
            <input type ='text'
            id = 'latitude'
            name = 'latitude'
            value = '{{ old('latitude', '42.367280')}}'
            >
            <div class='error'>{{ $errors->first('latitude') }}</div>

        </div>

        <div class = "form-group">
            <label>Longitude:</label>
            <input type ='text'
            id = 'longitude'
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
            <input class="form-control"
            type='text'
            cols= "20"
            rows = '3'
            id = 'text'
            name = 'text'
            value = '{{ old('text', 'Need bike lanes or cycle tracks on Nashua St, especially northbound')}}'>

            <div class='error'>{{ $errors->first('text') }}</div>
        </div>

        <button type='submit' class="sForm" class='btn btn-primary'>Add incident</button>
    </form>
@stop


@section('page-script')
<script type="text/javascript">

 // function myFunction(){
 //        $.ajax({
 //                type: "POST",
 //
 //
 //                url: "http://localhost/create",
 //                data: {
 //                    lat:34
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
