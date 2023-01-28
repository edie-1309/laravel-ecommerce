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
            'orders' => Order::where('user_id', auth()->user()->id)->whereNotIn('status', ['Already Received'])->get()
        ]);
    }

    public function detail(Order $order)
    {
        return view('order-detail', [
            'title' => 'Order detail',
            'order' => $order
        ]);
    }

    public function confirm_status(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'status' => 'required'
        ]);

        Order::where('id', $order->id)->update($validatedData);

        return redirect('/history')->with('success', 'Order has been completed');
    }

    public function history()
    {
        return view('history', [
            'title' => 'History Order',
            'orders' => Order::where('status', 'Already Received')->get()
        ]);
    }

    public function history_detail(Order $order)
    {
        return view('history-detail', [
            'title' => 'History Detail',
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
