<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Stock;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        return view('admin/order/index', [
            'title' => 'Admin - Order',
            'orders' => Order::whereNotIn('status', ['Already Received'])->get()
        ]);
    }

    public function show(Order $order)
    {
        return view('admin/order/show', [
            'title' => 'Admin - Detail Order',
            'order' => $order
        ]);
    }

    public function update_status(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'status' => 'required'
        ]);

        Order::where('id', $order->id)->update($validatedData);

        // Update Stock    
        foreach($order->order_detail as $order_detail)
        {
            $stock = Stock::where([
                'product_id' => $order_detail->product_id,
                'platform_id' => $order_detail->platform_id
            ])->first('stock');

            $qty = $stock->stock - $order_detail->qty;

            Stock::where([
                'product_id' => $order_detail->product_id,
                'platform_id' => $order_detail->platform_id
            ])->update([
                'stock' => $qty
            ]);
        }

        return back()->with('success', 'Status has been updated!');
    }
}
