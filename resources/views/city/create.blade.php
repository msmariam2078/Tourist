
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   
@stop

@section('content')
<form method='post' action="{{route('add-city')}}">
{{csrf_field()}}
<div class="form-group col-md-4">
      <label for=""> City name</label>
      <input type="text" class="form-control" name='city'>
    </div>
    <div class="form-group col-md-4">
      <label for=""> Country name</label>
      <input type="text" class="form-control" name='country'>
    </div>
    

    <button type="submit" class="btn btn-primary">Add city</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop