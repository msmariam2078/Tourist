@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Customer</h1>
@stop

@section('content')
<center><h1></h1><center><br><br>
<form method="post" action='{{route("update_customer",["customer"=>$customer])}}'>
{{csrf_field()}}
  <div class="form-group col-md-4">
<label for="name">name:</label>
<input type="text" id="name" name="name" value="{{$customer->name}}" class="form-control">
  </div>
  <div class="form-group col-md-4">
  <label for="mob">mobile:</label>
  <input type="tel" id="mob" name="mobile" class="form-control" value="{{$customer->mobile}}">
  </div>
  <div class="form-group col-md-4">
     <label for="exampleFormControlSelect1">Gender</label>
    <select class="form-control" id="exampleFormControlSelect1" name="gender">
      <option {{$customer->gender == 'male'? "selected" : ""}}>male</option>
      <option {{$customer->gender == 'fmale'? "selected" : ""}}>fmale</option>
    </select>
  </div>
  <div class="form-group col-md-4">
     <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" value="{{$customer->email}}">
  </div>
  <button type="submit" class="btn btn-primary">Update Customer</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
