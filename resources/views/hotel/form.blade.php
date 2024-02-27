@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Show Hotel Ratings</h1>
@stop

@section('content')
<center><h1></h1><center><br><br>
<form method="post" action='{{route("one_hotel")}}'>
    {{csrf_field()}}
    <div class="form-group col-md-4">
    <label for="name">Hotel Name: </label>
    <input type="text" name="name" id="name">
    </div>
    <button type="submit" class="btn btn-primary">show hotel</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
