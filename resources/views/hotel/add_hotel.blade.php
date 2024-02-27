@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1  style="color:red;">Add Hotel</h1>
@stop

@section('content')
<center><h1></h1><center><br><br>
<form method="post" action='{{route("store_hotel")}}'>
    {{csrf_field()}}
    <lable>name hotel: </lable>
    <input type="text" name="name">
    <div class="form-group col-md-4">
      <label for="">City:</label>
      <select name='city' class="form-control">
@foreach($city as $value)
<option value="{{$value->id}}">
{{$value->name}} 
</option>
@endforeach
</div>
<input type="submit" value="Add">
</form>
</select>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop