@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Choose Customer To Rate</h1>
@stop

@section('content')
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Choose Customer</h1>
@stop

@section('content')
<center><h1></h1><center><br><br>
<form method="post" action='{{route("post_form")}}'>
    {{csrf_field()}}
    <input type="hidden" value="{{$hotel_id}}" name="hotel_id"> 
    <select name="customer_id" class="form-control">
     @foreach($customers as $customer)
     <option value="{{$customer->id}}">
     {{$customer->email}} 
     </option>
     @endforeach
    </select>
    <br>
    <button type="submit" class="btn btn-primary">Rate</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
