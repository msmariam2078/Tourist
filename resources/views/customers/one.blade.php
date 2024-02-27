@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>The Customer</h1>
@stop

@section('content')
<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">name: {{$customer->name}}</li>
  <li class="list-group-item d-flex justify-content-between align-items-center">mobile: {{$customer->mobile}}</li>
  <li class="list-group-item d-flex justify-content-between align-items-center">gender: {{$customer->gender}}</li>
  <li class="list-group-item d-flex justify-content-between align-items-center">email: {{$customer->email}}</li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href='{{route("one_reserved",["customer"=>$customer])}}'>reseved hotels</a>
        <a href='{{route("edit_customer",["customer"=>$customer])}}'>edit</a>
        <a href='{{route("delete_customer",["customer"=>$customer])}}'>delete</a>
</li>
</ul>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
