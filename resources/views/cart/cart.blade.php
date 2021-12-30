@extends('layouts.theme')
@section('content')

<div class="container">
<div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col" >Quantity</th>
                            <th scope="col">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartitems as $item)
                        <?php
                        $selecteditem = \App\Models\Product::where('id',$item->id)->first();
                        ?>
                        <tr>
                            <td><img src="/files/{{$selecteditem->imgpath}}" width="50px" height="50px"> </td>
                            <td>{{$item->name}}</td>
                     
                            <td>
                                <form action="{{route('cart-update')}}" method="post">
                                    @csrf
                                <input type="hidden" value="{{$item->id}}" name="id">
                                <input type="number" style="max-width: 3rem" value="{{$item->quantity}}" name="quantity" id="">
                                  <button class="btn btn-info">Update</button>
                                </form>
                              
                            </td>
                            <td class="text-right">{{$item->price}}</td>

                            <td class="text-right">
                                <form action="{{route('cart-remove')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$item->id}}" name="id">
                                <button class="btn btn-danger">Remove </button>
                                </form>
                                
                            </td>
                        </tr>
                    
                     @endforeach
                        <tr>
                            <td></td>    
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>{{Cart::getTotal()}}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-4">
                    <button class="btn btn-block btn-info">Continue Shopping</button>
                </div>
                <div class="col-sm-12 col-md-4 ">
                    <a class="btn btn-lg btn-block btn-danger " href="/cart/removeall">Remove All</a>
                </div>
                <div class="col-sm-12 col-md-4 text-right">
                    <a class="btn btn-lg btn-block btn-success text-uppercase" href="/checkout">Checkout</a>
                </div>
             
            </div>
        </div>
    </div>
    </div>
    @endsection