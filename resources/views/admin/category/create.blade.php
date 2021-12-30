
@extends('admin.layouts.theme')

@section('content')
    <div class="container">
        <br>
        <a href="/admin/category" class="btn btn-primary">view all category</a>
        <br>
    <form action="{{route('category-create')}}"  method="post" enctype="multipart/form-data">
        @csrf
        <label for="">Title</label>
        <input type="text" class="form-control" name="title" id="">
        <br>
        <button class="btn btn-primary" type="submit">create</button>
    </form>
    </div>
@endsection
