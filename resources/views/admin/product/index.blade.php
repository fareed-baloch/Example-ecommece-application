@extends('admin.layouts.theme')



@section('content')
<div class="container">
    <br>
    <a href="/admin/product/create" class="btn btn-primary">Create +</a>
    <br>
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
                            <th>title</th>
                            <th>Category</th>
                            <th>description</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>created</th>
                            <th>updated</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>Category</th>
                            <th>description</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>created</th>
                            <th>updated</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach($data as $product)
                        <?php 
                    $cat = \App\Models\Category::where('id',$product->catid)->first();
                    ?>
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->title}}</td>
                            <td>{{$cat->title}}</td>
                            <td>{{$product->des}}</td>
                            <td>{{$product->price}}</td>
                            <td><img src="/files/{{$product->imgpath}}" width="50px" height="50px" alt=""></td>
                            <td>{{$product->created_at}}</td>
                            <td>{{$product->updated_at}}</td>
                            <td> <a class="btn btn-outline-primary" href="/admin/product/edit/{{$product->id}}">edit</a></td>
                            <td> <a class="btn btn-outline-danger" href="/admin/product/delete/{{$product->id}}">delete</a>
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
