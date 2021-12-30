
@extends('admin.layouts.theme')

@section('content')
    <div class="container">
        <br>
        <a href="/admin/product" class="btn btn-primary">view all products</a>
        <br>
    <form action="{{route('product-create')}}"  method="post" enctype="multipart/form-data">
        @csrf
        <label for="">Title</label>
        <input type="text" class="form-control" name="title" id="">
        <label for="">Category</label>
        <select  class="form-control" name="catid" id="">
           
            @foreach($data as $cat)
            <option value="{{$cat->id}}">{{$cat->title}}</option>
            @endforeach
        </select>

        <label for="">des</label>
        <input type="text" class="form-control" name="des" id="">
        <label for="">Price</label>
        <input type="number" class="form-control" name="price" id="">
        <label for="">Image</label>
        <input type="file" class="form-control" name="image" id="">
        <br>
        <button class="btn btn-primary" type="submit">create</button>
    </form>
    </div>
@endsection
