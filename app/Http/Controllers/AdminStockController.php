<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminStockController extends Controller
{
    public function index()
    {
        return view('admin/stock/index', [
            'title' => 'Admin - Stock',
            'products' => Product::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'platform_id' => 'required',
            'stock' => 'required|numeric'
        ],
        [
            'platform_id' => 'The Platform is required'
        ]);
        
        // Check if platform already exist
        $platform = Stock::where([
                                    ['product_id', '=', $request->product_id],
                                    ['platform_id', '=', $request->platform_id]
                                ])->first();

        if($platform)
        {
            if($request->platform_id == $platform->platform_id)
            {
                // dump('platform already exist');
                return back()->with('fail', 'Platform already exist!');
            }
        }

            Stock::create($validatedData);

        return back()->with('success', 'Stock has beed added');
    }

    public function show(Product $product)
    {
        return view('admin/stock/show', [
            'title' => 'Detail Product - ' . $product->name,
            'product' => $product
        ]);
    }

    public function edit(Stock $stock)
    {
        $stock = $stock;
        $platform_name = $stock->platform->name;

        return response()->json([
            'stock' => $stock,
            'platform_name' => $platform_name
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'platform_id' => 'required',
            'stock' => 'required|numeric'
        ]);

        Stock::where('id', $request->id)->update($validatedData);

        return back()->with('success', 'Stock has beed updated!')->with('success', 'Stock has been updated!');
    }

    public function destroy(Stock $stock)
    {
        Stock::destroy($stock->id);

        return back()->with('success', 'Stock has been deleted');
    }
}
