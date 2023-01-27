<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout', [
            'title' => 'Checkout',
            'data' => Cart::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function store(request $request)
    {
        $order = Order::create([
            'slug' => Str::random(10),
            'user_id' => auth()->user()->id,
            'payment' => $request->payment,
            'total' => $request->total,
            'status' => 'On Process'
        ]);

        // Order detail
        for($i = 0; $i < count($request->product_id); $i++)
        {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $request->product_id[$i],
                'platform_id' => $request->platform_id[$i],
                'qty' => $request->qty[$i]
            ]);
        }

        // Destroy cart
        Cart::where('user_id', auth()->user()->id)->delete();

        return to_route('cart');
    }
}
