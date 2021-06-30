@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<a href="{{route('category_add')}}">Add todo list</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Họ Tên</th>
      <th scope="col">Năm Sinh</th>
      <th scope="col">Nơi Sinh</th>
      <th scope="col">IMAGE</th>
    </tr>
  </thead>
  <tbody>
  @foreach($categories as $cat)
    <tr>
      <th>{{ $cat->id }}</th>
      <td>{{ $cat->name }}</td>
      <td>{{ $cat->birth_year }}</td>
      <td>{{ $cat->birthplace }}</td>
      <td style="display: flex;">
        <a style="margin-right: 10px;" class="btn btn-primary" href="{{route('category_edit_form',$cat->id)}}" role="button">Edit</a>
        <!-- <a class="btn btn-danger" href="" role="button">Delete</a> -->
        <form action="{{route('category_delete',$cat->id)}}" method="POST">
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


