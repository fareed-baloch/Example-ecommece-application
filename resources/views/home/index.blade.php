@extends('layouts.theme')
@section('content')

<div class="container">

<h1>Home Page</h1>


    <div class="row">

        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row ">
                    @foreach($data as $product)

                    <?php 
                    $cat = \App\Models\Category::where('id',$product->catid)->first();
                    ?>
                    <div class="col-md-4 col-sm-12 mb-4">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="/files/{{$product->imgpath}}" />
                            <!-- Product details-->
                            <div class="card-body p-4">

                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$cat->title}} || {{$product->title}}</h5>
                                    <!-- Product price-->
                                    {{$product->price}} Pkr 
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                        href="/product/{{$product->id}}">View</a></div>
                            </div>
                        </div>
                    </div>
              

                    @endforeach
                    </div>
            </div>
        </section>

    </div>

</div>

@endsection