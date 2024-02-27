
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

<center></center></br></br>
<center><form method='post' action="{{route('create-book',['id'=>$ticket->id])}}">
{{csrf_field()}}
<div class="form-group col-md-4">
      <label for="">email</label>
      <input type="text" class="form-control" name="email">
    </div>
    <div class="form-group col-md-4">
      <label for="">City</label>
      <input type="text" name="city" class="form-control" value="{{$ticket->city->name}}"  readonly name="city">
    </div>

    <div class="form-group col-md-4">
      <label for="">Company</label>
      <input type="text" name="company" class="form-control" value="{{$ticket->company->title}}"  readonly name="city">
    </div>



    <div class="form-group col-md-4">
      <label for="">Hotel</label>
      <select name='hotel' class="form-control">
    <option value='{{Null}}'>Not Book
</option>
@foreach($ticket->city->hotels as $hotel)
<option value="{{$hotel->id}}">
{{$hotel->name}} 
</option>
@endforeach


</select></div>
<div class="form-group col-md-4">
      <label for="">Date</label>
      <input type="text" name='date' class="form-control" value="{{date('m/d/Y h:i:s a', time())}}" readonly >
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form></center>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop