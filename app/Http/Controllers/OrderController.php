<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('order', [
            'title' => 'Orders - ' . auth()->user()->name,
            'orders' => Order::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function detail(Order $order)
    {
        return view('order-detail', [
            'title' => 'Order detail',
            'order' => $order
        ]);
    }

    public function destroy(Order $order)
    {
        Order::destroy($order->id);

        OrderDetail::where('order_id', $order->id)->delete();

        return redirect('orders')->with('success', 'The order has been cancelled');
    }
}
