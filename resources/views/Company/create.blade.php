@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Add Company</h1>
@stop

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Company</title>
</head>
<body>

  <div class="container h-100 mt-5">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-6">
      <h3>Add a company</h3>
      <form action="{{ route('Company.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="title">Name </label>
          <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
          <label for="address">address</label>
          <textarea class="form-control" id="address" name="address" rows="3" required placeholder="Country-City-street"></textarea>
        </div>
        <div class="form-group">
          <label >phone</label>
          <input type="number" class="form-control" id="phone" name="phone" rows="3" required>

        </div>
        <br>
        <button type="submit" class="btn btn-primary">Add A company</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
