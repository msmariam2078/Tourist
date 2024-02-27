@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>All Reserves</h1>
@stop

@section('content')
<ul class="list-group">
@foreach($customers as $customer)
<li class="list-group-item d-flex justify-content-between align-items-center">{{$customer->name}} reserved: </li>
  @foreach(($customer->reservedHotels) as $hotel)
  <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">{{$hotel->name}} <a href='{{route("rating_form",["customer_id"=>$customer->id,"hotel_id"=>$hotel->id])}}'>rate</a></li>
  </ul>
  @endforeach
@endforeach
</ul>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
