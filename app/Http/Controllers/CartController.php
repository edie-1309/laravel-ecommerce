<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('cart', [
            'title' => 'Cart',
            'cart' => Cart::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'platform_id' => 'required',
            'qty' => 'required',
            'total' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        $validatedData['total'] = $request->total * $request->qty;

        Cart::create($validatedData);

        return to_route('cart');
    }

    public function update(Cart $cart, Request $request)
    {
        $validatedData = $request->validate([
            'qty' => 'required',
            'total' => 'required'
        ]);

        Cart::where('id', $cart->id)->update($validatedData);
        return response()->json(['success' => 'Cart has been updated!']);
    }

    public function destroy(Cart $cart)
    {
        Cart::destroy($cart->id);

        return to_route('cart');
    }
}
