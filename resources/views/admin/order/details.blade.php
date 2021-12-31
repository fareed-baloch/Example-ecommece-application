@extends('admin.layouts.theme')



@section('content')
<div class="container">


    <h1>Order id : {{$order->id}} Grand Total : {{$order->total}}</h1>
    @if($order->status == 0)
    <span class="badge badge-primary">order submited</span>
    @endif
    @if($order->status == 1)
    <span class="badge badge-secondary">order confrimed</span>
    @endif
    @if($order->status == 2)
    <span class="badge badge-info">order payment recived</span>
    @endif
    @if($order->status == 3)
    <span class="badge badge-success">order shipped</span>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Prodcut</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Sub-Total</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Prodcut</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Sub-Total</th>

                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach($order_details as $item)
                        <?php
                        $product = \App\Models\Product::where('id',$item->productid)->first();
                        ?>
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$product->title}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->price * $item->quantity}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection




<!-- DataTales Example
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                     
                                        <tr>
                                            <td>Donna Snider</td>
                                            <td>Customer Support</td>
                                            <td>New York</td>
                                            <td>27</td>
                                            <td>2011/01/25</td>
                                            <td>$112,000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> -->