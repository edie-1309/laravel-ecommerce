<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminDiscountController extends Controller
{
    public function index()
    {
        return view('admin/discount/index', [
            'title' => 'Admin - Discount',
            'discounts' => Discount::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'discount' => 'required'
        ]);

        $discount = intval(Str::remove('%', $request->discount));

        Discount::create(['discount' => $discount]);

        return redirect('/dashboard/discount')->with('success', 'Discount has been added!');
    }

    public function destroy(Discount $discount)
    {
        Discount::destroy($discount->id);

        return redirect('/dashboard/discount')->with('success', 'Discount has been deleted!');
    }
}
