<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Product::all();
        return view('admin.product.index',['data' =>$data ]);
    }
    public function all()
    {
        //

        $data = Product::all();
        $data2 = Category::all();
        return view('product.products',['data' =>$data ,'data2' => $data2,'title' => 'All Products']);
    }

    public function by_cat($id)
    {
        //

        $data = Product::where('catid',$id)->get();
        $data2 = Category::all();
        $cat = Category::where('id',$id)->first();
        return view('product.products',['data' =>$data ,'data2' => $data2,'title' => 'All Products from '.$cat->title]);
    }


    public function about()
    {
        //
      //  $data = Product::all();
      $data2 = Category::all();
        return view('about.index',['data2' => $data2 , 'title'=> 'About us page']);
    }
    public function home()
    {
 
        $data = Product::inRandomOrder()->limit(6)->get();
        $data2 = Category::all();
        return view('home.index',['data2' => $data2, 'title' => 'HOME PAGE','data'=>$data]);
    }

    public function single($id)
    {
        //

        $comments = comment::where('productid',$id)->get();
        $data2 = Category::all();
        $data = Product::where('id',$id)->first();
        $cat = Category::where('id', $data->catid)->first();
        return view('product.single',['product'=> $data , 'data2'=> $data2,'cat'=>$cat , 'title' => 'Single Product','comments'=>$comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = Category::all();
        return view('admin.product.create',['data'=>$data]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
        $validated = $request->validate([
            'title' => 'required|unique:products|max:255',
            'des' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif,webp|required|max:10000' //10000kb
        ]);
    
      


        $product = new Product;
        $product->title = $request->input('title');
        $product->catid = $request->input('catid');
        $product->des = $request->input('des');
        $product->price = $request->input('price');

          if($request->hasfile('image'))
        {   
            $file = $request->file('image');
            $extension = $request->image->getClientOriginalExtension();  //Get Image Extension
            $fileName = 'mysiteimage'.time().'.'.$extension;  //Concatenate both to get FileName (eg: file.jpg)
            $file->move(public_path().'/files/', $fileName);  
            $data = $fileName; 
            $product->imgpath = $data;
        }
        
        $product->save();
       //return Redirect::back()
       return redirect('admin/product')->with('success', '1 product added !!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($productid)
    {
        //

        $data = Product::find($productid);
        return view('admin.product.edit',['data' => $data]);
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $id = $request->input('id');
        $title = $request->input('title');
        $des = $request->input('des');
        Product::where('id',$id)->update(['title' =>$title, 'des' => $des]);
        return redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect('admin/product')->with('danger', '1 Product Removed Successfully !');
        
    }
    public function comment(Request $request)
    {
        $comment = new Comment;
        $comment->productid = $request->input('id');
        $comment->name = $request->input('name');
        $comment->comment = $request->input('comment');
        $comment->status = 0 ;
        $comment->save();
        return redirect()->back()->with('success', 'Comment Posted');
     
    }

 
}
