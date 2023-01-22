<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products', [
            'title' => 'Eazy Play! - All Games',
            'products' => Product::all()
        ]);
    }

    public function show(Product $product)
    {
        return view('product', [
            'title' => 'Eazy Play! - ' . $product->name,
            'product' => $product
        ]);
    }
}
