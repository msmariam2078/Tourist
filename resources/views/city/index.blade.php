@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<br>
<center><button class="btn btn-light"><a href="{{route('create-city')}}">Add City</a></button></center><br>
<li href=""  class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1"> Name</h5>
      <h5 class="mb-1"> Country</h5>
     

 </li><br>
@foreach($cities as $c)
<li href=""  class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">{{$c->name}}</h5>
      <h5 class="mb-1"> {{$c->country}}</h5>
     

 </li>



@endforeach

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop