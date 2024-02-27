@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>some thing not ok</h1>
@stop

@section('content')
<h4>{{$message}}</h4>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
