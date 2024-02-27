@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>All Companies</h1>
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

  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid;">
        <center>
      <a class="navbar-brand h1" href={{ route('Company.index') }}>Company Page</a>
      </center>
    </div>
  </nav>


  <div class="container mt-5">
    <div class="row">
      @foreach ($companies as $company)
                <div class="col">
                <div class="card" style="width: 25rem; ">
                    <div class="card-header border border-danger">

                    <h5 class="card-title"><center>The Company Name is: </br>{{ "$company->title" }}</center></h5>
                    </div>
                    <div class="border border-dark">
                    <p class=" mb-2 text-body"><center>The Address : </br>{{ "$company->address" }}</center></p>
                    </div>
                    <div class=" border border-dark">
                    <p class=" mb-2 text-body-secondary"><center>PhoneNumber: </br>{{ "$company->phone" }}</center></p>
                    </div>
                    <center>

                    <div class="card-footer border border-primary">
                    <div class="row">
                        <div class="col-sm">
                            <form action="{{ route('Company.destroy', $company->id) }}" method="post">
                            {{ csrf_field()  }}
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                    </div>

                    </center>
                </div>
                </div>
      @endforeach
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
