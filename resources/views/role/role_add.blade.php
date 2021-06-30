@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Danh Mục ADD</h1>
@stop

@section('content')
<form class="col-md-8" action="{{ route('create_add') }}" method="post">
@csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name"placeholder="name">

    <label for="email">display_name</label>
    <input type="text" class="form-control" name="display_name"placeholder="display_name">

  </div>
    <div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

