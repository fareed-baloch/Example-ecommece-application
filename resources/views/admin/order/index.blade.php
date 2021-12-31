@extends('admin.layouts.theme')



@section('content')
<div class="container">

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
                            <th>Name</th>
                            <th>address</th>
                            <th>Phone</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>created</th>
                            <th>updated</th>
                            <th>Update Status</th>
                            <th>view</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>address</th>
                            <th>Phone</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>created</th>
                            <th>updated</th>
                            <th>Update Status</th>
                            <th>view</th>

                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->total}}</td>
                            <td>
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

                            </td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->updated_at}}</td>
                            <td>
                                @if($order->status == 0)
                                <form action="{{route('order-status')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$order->id}}" name="id">
                                    <input type="hidden" value="1" name="status">
                                    <button class="btn btn-secondary" type="submit">Confrim Order</button>
                                </form>
                                @endif
                                @if($order->status == 1)
                                <form action="{{route('order-status')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$order->id}}" name="id">
                                    <input type="hidden" value="2" name="status">
                                    <button class="btn btn-info" type="submit">Receive-Payment</button>
                                </form>
                                @endif
                                @if($order->status == 2)
                                <form action="{{route('order-status')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$order->id}}" name="id">
                                    <input type="hidden" value="3" name="status">
                                    <button class="btn btn-success" type="submit">Ship-Order</button>
                                </form>
                                @endif
                            </td>
                            <td> <a class="btn btn-outline-info" href="/admin/order/{{$order->id}}">View</a>
                            </td>
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