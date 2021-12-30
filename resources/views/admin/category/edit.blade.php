
@extends('admin.layouts.theme')



@section('content')
    <div class="container">
        <br>
        <a href="/admin/category" class="btn btn-primary">view all products</a>
        <br>
    <form action="{{route('category-update')}}" method="post">
        @csrf
        <input type="hidden" value="{{$data->id}}" name="id">
        <label for="">Title</label>
        <input type="text" class="form-control" value="{{$data->title}}" name="title" id="">
       <br>
        <button class="btn btn-primary" type="submit">Update</button>
    </form>

    </div>

    @endsection