<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminStockController__ extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/stock/index', [
            'title' => 'Admin - Stock',
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/stock/create', [
            'title' => 'Create stock',
            'products' => Product::all(),
            'platform' => Platform::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'platform_id' => 'required',
            'stock' => 'required|numeric'
        ]);

        Stock::create($validatedData);

        return redirect('/dashboard/stock')->with('success', 'Stock has beed added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        dd($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        return view('admin/stock/edit', [
            'title' => 'Edit stock',
            'stock' => $stock,
            'products' => Product::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'stock' => 'required|numeric'
        ]);

        Stock::where('id', $stock->id)->update($validatedData);

        return redirect('/dashboard/stock')->with('success', 'Stock has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        Stock::destroy($stock->id);

        return redirect('/dashboard/stock')->with('success', 'Stock has been deleted!');
    }
}
