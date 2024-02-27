
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   
@stop

@section('content')
<center><h1></h1><center><br><br>
<form method='post' action="{{route('create-ticket')}}">
{{csrf_field()}}
<div class="form-group col-md-4">
      <label for="">Company</label>
      <select name='company' class="form-control">
    @foreach($company as $value)
<option value="{{$value->id}}">
{{$value->title}} 
</option>
@endforeach
</select></div>
<div class="form-group col-md-4">
      <label for="">City</label>
      <select name='city' class="form-control">
@foreach($city as $value)
<option value="{{$value->id}}">
{{$value->name}} 
</option>
@endforeach

</select>
</div>
<div class="form-group col-md-4">
      <label for=""> Date Start</label>
      <input type="text" class="form-control" name='date_s'>
    </div>
    <div class="form-group col-md-4">
      <label for=""> Date End:</label>
      <input type="text" class="form-control"  name='date_e'>
    </div>


    <button type="submit" class="btn btn-primary">Add Ticket</button>

</select></form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
