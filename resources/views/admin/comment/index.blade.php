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
                            <th>Comment</th>
                            <th>Status</th>
                            <th>created</th>
                            <th>updated</th>
                            <th>Update Status</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Comment</th>
                            <th>Status</th>
                            <th>created</th>
                            <th>updated</th>
                            <th>Update Status</th>
                            <th>delete</th>
                        </tr>
                    </tfoot>
                    <tbody>


                        <?php 
                    $comments = \App\Models\Comment::all();
                    ?>
                        @foreach($comments as $comment)
                        <tr>
                            <td>{{$comment->id}}</td>
                            <td>{{$comment->name}}</td>
                            <td>{{$comment->comment}}</td>
                            <td>
                                @if($comment->status == 0)
                                <span class="badge badge-danger">Disappoved</span>
                                @else
                                <span class="badge badge-success">Approve</span>
                                @endif

                            </td>
                            <td>{{$comment->created_at}}</td>
                            <td>{{$comment->updated_at}}</td>
                            <td>
                                @if($comment->status == 0)
                                <form action="{{route('comment-status')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$comment->id}}" name="id">
                                    <input type="hidden" value="1" name="status">
                                    <button class="btn btn-success" type="submit">Approved</button>
                                </form>
                                @else
                                <form action="{{route('comment-status')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$comment->id}}" name="id">
                                    <input type="hidden" value="0" name="status">
                                    <button class="btn btn-danger" type="submit">Dis-Approve</button>
                                </form>
                                @endif
                            </td>
                            <td> <a class="btn btn-outline-danger"
                                    href="/admin/comment/delete/{{$comment->id}}">delete</a>
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