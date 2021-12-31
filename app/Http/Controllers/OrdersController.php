<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Orders;
use App\Models\OrderDetail;


class OrdersController extends Controller
{
    //
    public function checkout()
    {
        $data = Product::inRandomOrder()->limit(6)->get();
        $data2 = Category::all();
        return view('checkout.index',['data2' => $data2, 'title' => 'CHECKOUT PAGE','data'=>$data]);
     }

     public function processOrder(Request $request)
    {

       
        $cartItems = \Cart::getContent();
        $order = new Orders;
        $order->name = $request->input('name');
        $order->address = $request->input('address');
        $order->phone = $request->input('phone');
        $order->total = $request->input('total');
        $order->status = 0;

         $order->save();

        $orderid = $order->id;

        foreach($cartItems as $item)
            {
                   
                $order_detail = new OrderDetail;
                $order_detail->orderid = $orderid;
                $order_detail->productid = $item->id;
                $order_detail->quantity = $item->quantity;
                $order_detail->save();
            }


             \Cart::clear();
            return redirect('/orderConfirmed/'. $orderid);



    }

    public function orderConfirmed($id)
    {
        $data = Product::inRandomOrder()->limit(6)->get();
        $data2 = Category::all();
        return view('checkout.orderConfirm',['data2' => $data2, 'title' => 'ORDER CONFRIMED','data'=>$data,'ordernumber'=>$id]);
     }


     public function GetAllOrders(){
         $orders = Orders::all();
         return view('admin.order.index',['orders'=>$orders]);
     }
     public function orderStatus(Request $request){
        $id = $request->input('id');
        $status = $request->input('status');
        Orders::where('id',$id)->update(['status' =>$status]);
        return redirect('admin/order')->with('Success','Order Status Updated');
    }

    public function GetOrderDetails($id){
         $order = Orders::where('id',$id)->first();

        $order_details = OrderDetail::where('orderid',$id)->get();
         return view('admin.order.details',['order'=>$order , 'order_details'=>$order_details]);


    
    }



}
