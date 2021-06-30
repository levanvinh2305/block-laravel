@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Danh Mục ADD</h1>
@stop

@section('content')
<form class="col-md-8" action="{{ route('users_add') }}" method="post">
@csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name"placeholder="name">

    <label for="email">Email</label>
    <input type="text" class="form-control" name="email"placeholder="email">

    <label for="password">Password</label>
    <input type="password" class="form-control" name="password"placeholder="password">

    <label for="confirm_password">Re-Password</label>
    <input type="password" class="form-control" name="confirm_password"placeholder="password">

  </div>

    @foreach($roles as $role)
        <div class="form-group">
            <input type="checkbox"name='roles[]' class="form-check-input" value="{{$role->id}}">
            <label class="form-check-label" for="exampleCheck1">{{$role->name}}</label>
        </div>
    @endforeach
    <!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->

<!-- Create Post Form -->
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

