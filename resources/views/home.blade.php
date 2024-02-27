@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<form method='post' action="{{route('filtered-ticket')}}">
{{csrf_field()}}

<center><h1>Availble Tickets</h1><center><br>

<div class="form-group col-md-4">
      <label for="">City</label>
      <select name='city' class="form-control">
@foreach($city as $value){

<option value="{{$value->id}}">{{$value->name}}
</option>
}
@endforeach


</select>
</div>
<div class="form-group col-md-4">
      <label for="">Date Start</label>
      <input type="text" class="form-control" name="date">
    </div>
    <button type="submit" class="btn btn-primary">Filter</button>

</form>

 
<button type="button" class="btn btn-warning"><a href="{{route('add-ticket')}}">Add ticket</a></button>

<div class="list-group">
@foreach($ticket as $value)

<li class="list-group-item"><small>Flight</small>  <h4>{{$value->city->name}}   <small>on lines</small>   <bold> {{$value->company->title}} </bold><small>At</small>     {{$value->date_s}} </h4> <br>
<a href="{{route('add-book',['id'=>$value->id])}}">Book now</a >

<pre><a href="{{route('delete-ticket',['ticket'=>$value])}}">Delete ticket</a></pre></li>



@endforeach
</ul>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
