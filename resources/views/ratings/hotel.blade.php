@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Hotel Ratings</h1>
@stop

@section('content')
  <h4>{{$hotel->name}} rated by: </h4>
  @foreach(($hotel->customersRatedWithRate) as $customer)
  <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">{{$customer->name}} -> {{$customer->pivot->rate}}, comment: {{$customer->pivot->comment}}</li>
  </ul>
  @endforeach
</ul>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
