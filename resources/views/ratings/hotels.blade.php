@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>All Hotels Ratings</h1>
@stop

@section('content')
<ul class="list-group">
@foreach($hotels as $hotel)
<li class="list-group-item d-flex justify-content-between align-items-center">{{$hotel->name}} rated by: </li>
  @foreach(($hotel->customersRatedWithRate) as $customer)
  <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">{{$customer->name}} -> {{$customer->pivot->rate}}, comment: {{$customer->pivot->comment}}</li>
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
