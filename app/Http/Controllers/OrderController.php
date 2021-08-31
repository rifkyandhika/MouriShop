<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItems;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }


    public function confirm($id) {

        // Find the order
        $order = Order::find($id);
        $items = OrderItems::where('order_id', $id)->get();
        foreach($items as $i => $item) {
            $pid = $item->product_id;
            $product = Product::where('id', $pid)->first();
            $product->stock = $product->stock - $item->quantity;
            $product->save(); 
        }
        
        // Update the Order
        $order->update(['status' => 'Confirmed']);

        // Session message
        session()->flash('msg','Order has been confirmed');

        // Redirect the page
        return redirect('admin/orders');


    }

    public function process($id) {

        // Find the order
        $order = Order::find($id);

        // Update the Order
        $order->update(['status' => 'Processed']);

        // Session message
        session()->flash('msg','Order has been proceed');

        // Redirect the page
        return redirect('admin/orders');


    }


    public function pending($id){

        // Find the order
        $order = Order::find($id);

        // Update the order status

        $order->update(['status' => 'Pending']);

        // Session Message
        session()->flash('msg','Order has been again into pending');

        // Redirect the page
        return redirect('admin/orders');

    }

    public function show($id) {
        $order = Order::find($id);
        return view('admin.orders.details', compact('order'));
    }

}
