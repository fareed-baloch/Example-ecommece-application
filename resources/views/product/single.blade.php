@extends('layouts.theme')
@section('content')


<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="/files/{{$product->imgpath}}" alt="...">
            </div>
            <div class="col-md-6">
                <div class="small mb-1">{{$cat->title}}</div>
                <h1 class="display-5 fw-bolder">{{$product->title}}</h1>
                <div class="fs-5 mb-5">
                    <!-- <span class="text-decoration-line-through"></span> -->
                    <span>{{$product->price}} Pkr</span>
                </div>
                <p class="lead">{{$product->des}}</p>
                <div class="d-flex">
                    <form action="{{ route('cart-add') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->title }}" name="title">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input class="form-control text-center me-3" id="inputQuantity" name="quantity" type="number"
                            value="1" style="max-width: 3rem">
                        <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    


</section>

<div class="container">
<div class="row">
    @foreach($comments as $comment)
    <p> <strong>{{$comment->name}}</strong>: {{$comment->comment}}</p>
@endforeach
</div>
<div class="row">
    <form action="{{route('comment-add')}}" method="post">
        @csrf
        <input type="hidden" value="{{$product->id}}" name="id">
        <label for="">Name</label>
        <input class="form-control" type="text" name="name" id="">
        <textarea  class="form-control" name="comment" id="" cols="30" rows="10"></textarea>
    <button  class="btn btn-info" type="submit">Comment</button>
    </form>
</div>
</div>


@endsection
