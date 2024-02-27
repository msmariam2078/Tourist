
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<form method='post' action="{{route('update-book',['booking'=>$booking])}}">
{{csrf_field()}}
<div class="form-group col-md-4">
<label for="">Name:</label>
      <input type="text" name='name' class="form-control" value="{{$booking->customer->name}}" readonly >
    </div>
    <div class="form-group col-md-4">
    <label for="">city:</label>
      <input type="text" name='city' class="form-control" value="{{$booking->ticket->city->name}}" readonly >
    </div>
    <div class="form-group col-md-4">
    <label for="">company:</label>
      <input type="text" name='company' class="form-control" value="{{$booking->ticket->company->title}}" readonly >
    </div>


    <div class="form-group col-md-4">
      <label for="">Hotel</label>
      <select name='hotel' class="form-control">
    <option value='{{Null}}'>Not Book
</option>

@foreach($booking->ticket->city->hotels as $hotel)
<option  {{ $hotel->id== $booking->hotel_id ? 'selected':"" }} value="{{$hotel->id}}">
{{$hotel->name}} 
</option>
@endforeach


</select>

</div>
<div class="form-group col-md-4">
    <label for="">date:</label>
      <input type="text" name='date' class="form-control" value="{{$booking->book_date}}" readonly >
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop