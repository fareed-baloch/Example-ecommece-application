@extends('admin.layouts.theme')



@section('content')
<div class="container">
    <br>
    <a href="/admin/product" class="btn btn-primary">view all products</a>
    <br>
    <form action="{{route('product-update')}}" method="post">
        @csrf
        <input type="hidden" value="{{$data->id}}" name="id">
        <label for="">Title</label>
        <input type="text" class="form-control" value="{{$data->title}}" name="title" id="">
        <label for="">des</label>
        <input type="text" class="form-control" value="{{$data->des}}" name="des" id="">
        <label for="">price</label>
        <input type="text" class="form-control" value="{{$data->price}}" name="price" id="">
        <br>
        <button class="btn btn-primary" type="submit">Update</button>
    </form>

</div>

@endsection