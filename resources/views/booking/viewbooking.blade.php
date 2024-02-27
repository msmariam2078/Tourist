@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

<form method="post" action="{{route('filter-book')}}">
{{csrf_field()}}

<div class="form-group col-md-4">
      <label for="">filter bookings:</label>
      <select name='filter' class="form-control">

<option value="1">
  by customer email
</option>
<option value="2">
  by booking date
</option>
<option value="3">
  by customer and date
</option>
</select></div>
<div class="form-group col-md-4">
     
      <input type="text" class="form-control" placeHolder="Enter email"name='email'>
    </div>
    <div class="form-group col-md-4">

      <input type="text" class="form-control" placeHolder="Enter date" name='date'>
    </div><pre><button type="submit" class="btn btn-primary">Filter</button></pre>
</form>
<pre><button class="btn btn-light"><a href="{{route('tickets')}}">Add book</a></button></pre>
<ul class="list-group">
<li href=""  class="list-group-item list-group-item-action flex-column align-items-start">
<div class="d-flex w-100 justify-content-between">    
<h5 class="">Customer Name</h5>
   
      <h5 class="mb-1"> City</h5>
      <h5 class="mb-1">Company</h5>
      <h5>Hotel Book</h5>
    <li>
@foreach($bookings as $value)
<li href=""  class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">{{$value->customer->name}}</h5>
      <h5 class="mb-1">{{$value->ticket->city->name}}</h5>
      <h5>{{$value->ticket->company->title}}</h5>
      <small> {{$value->hotel_id!==null ? $value->hotel->name : 'there no hotel book'}}</small>
      </div>
    <p class="mb-1"></p>
    <small class="text-muted">{{$value->book_date}}</small><br><br>
    <button type="button" class="btn btn-light"><a href="{{route('edit',['booking'=>$value])}}">Edit Book</a></button>
    <button type="button" class="btn btn-light"><a href="{{route('delete',['booking'=>$value])}}">Delete Book</a></button>
</li><br>
@endforeach
</ul>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
