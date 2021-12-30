<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CartController extends Controller
{
    
    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->title,
            'price' => $request->price,
            'quantity' => $request->quantity,
            ]);

        return redirect()->back()->with('success', 'Product is Added to Cart Successfully !');
    }

    public function cartList()
    {

        $cartItems = \Cart::getContent();

        //dd($cartItems);
        $data2 = Category::all();
        return view('cart.cart',['data2' => $data2, 'title' => 'SHOP WITH US','cartitems'=>$cartItems]);
    }


     public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
     return redirect()->back()->with('success', 'Product quantity updated !');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->back()->with('danger', 'Product is removed from Cart !');
    }

    public function clearAllCart()
    {
        \Cart::clear();
        return redirect()->back()->with('danger', 'all Products removed from Cart !');
  
    }

}
