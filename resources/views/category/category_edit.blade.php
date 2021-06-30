@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>sửa danh mục</h1>
@stop

@section('content')
<form action="{{route('category_edits',$cat->id)}}" method="POST">
@csrf
{{ @method_field('PUT')}}
  <div class="form-group">
    <label for="exampleInputEmail1">Họ Tên</label>
    <input type="name" class="form-control" name="name" aria-describedby="emailHelp" placeholder="name" value="{{ $cat->name }}">

    <label for="exampleInputEmail1">Năm sinh</label>
    <input type="datetime" class="form-control" name="birth_year" aria-describedby="emailHelp" placeholder="birth_year"value="{{ $cat->birth_year }}">

    <label for="exampleInputEmail1">Nơi Sinh</label>
    <input type="name" class="form-control" name="birthplace" aria-describedby="emailHelp" placeholder="birthplace"value="{{ $cat->birthplace }}">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

