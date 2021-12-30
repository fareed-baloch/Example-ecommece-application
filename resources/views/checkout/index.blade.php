@extends('layouts.theme')
@section('content')


<div class="container">

<a class="btn btn-info" href="/cart">view Cart</a>
<div class="row">
    <form action="{{route('order-process')}}" method="post">
        @csrf
        <label for="">Name:</label>
        <input class="form-control" type="text" name="name" id="">
        <label for="">Address:</label>
        <input class="form-control" type="text" name="address" id="">
        <label for="">Phone#:</label>
        <input class="form-control" type="text" name="phone" id="">

       <input type="hidden" name="total" value="{{Cart::getTotal()}}">
        <button class="btn btn-success" type="submit">Confrim order</button>
    </form>
</div>

</div>


@endsection