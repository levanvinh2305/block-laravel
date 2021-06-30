@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>sửa danh mục</h1>
@stop

@section('content')
<form action="{{route('user_edits',$user->id)}}" method="POST">
@csrf
{{ @method_field('PUT')}}
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name"placeholder="name" value="{{ $user->name }}">

    <label for="email">Email</label>
    <input type="text" class="form-control" name="email"placeholder="email" value="{{ $user->email }}">

    <label for="password">Password</label>
    <input type="password" class="form-control" name="password"placeholder="password" value="{{ $user->password }}">

    <label for="confirm_password">Re-Password</label>
    <input type="password" class="form-control" name="confirm_password"placeholder="password" value="{{ $user->confirm_password }}">

  </div>
  @foreach($roles as $role)
        <div class="form-group">
            <input type="checkbox"name='roles[]'
            @if(in_array($role->id, $userRoles)) checked @endif
            class="form-check-input" value="{{$role->id}}">
            <label class="form-check-label" for="exampleCheck1">{{$role->name}}</label>
        </div>
    @endforeach
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

