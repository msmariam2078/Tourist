@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1  style="color:red;">One Hotel</h1>
@stop

@section('content')
<ul class="list-group">
<center><h1></h1><center><br><br>
<li class="list-group-item d-flex justify-content-between align-items-start">
    <h6><p style="color:blue;">Name Hotel</p></h6>
{{$hotel->name}}
<h6 style="color:blue;">City</h6>
{{$hotel->city->name}}
<a href="{{route('delete-hotel',['hotel'=>$hotel])}}">Delete Hotel</a>
</li>
<li class="list-group-item d-flex justify-content-between align-items-start">
    <a href='{{route("hotel_ratings",["name"=>$hotel->name])}}'>ratings</a>
    <a href='{{route("customer_rating_form",["hotel_id"=>$hotel->id])}}'>rate it</a>
</li>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop