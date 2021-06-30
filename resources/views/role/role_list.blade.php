@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="text-right">
<a class="btn btn-success" href="{{route('role_add')}}">+ Tạo Mới</a>
</div>

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Display_name</th>
      <!-- <th scope="col">password</th> -->
      <th scope="col">ACtion</th>

    </tr>
  </thead>
  <tbody>
@foreach($roles as $role)
    <tr>
      <th>{{ $role->id }}</th>
      <td>{{ $role->name }}</td>
      <td>{{ $role->display_name }}</td>
      <td style="display: flex;">
        <a style="margin-right: 10px;" class="btn btn-primary" href="{{route('show_edit_role',$role->id)}}" role="button">Edit</a>
        <!-- <a class="btn btn-danger" href="" role="button">Delete</a> -->
        <form action="{{route('role_delete',$role->id)}}" method="POST">
        @csrf
        {{ @method_field('DELETE')}}
        <button class="btn btn-danger" role="button">Delete</button>
      </form>
      </td>
    </tr>
@endforeach
  </tbody>
</table>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop



