@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Show Customer</h1>
@stop

@section('content')
<center><h1></h1><center><br><br>
<form method="post" action='{{route("email_customer")}}'>
    {{csrf_field()}}
    <div class="form-group col-md-4">
     <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
  </div>
  <button type="submit" class="btn btn-primary">Search</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
