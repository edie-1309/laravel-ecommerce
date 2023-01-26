<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Platform;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        if(request('search'))
        {
            $products = Product::searchFilter(request('search'))->paginate(12)->withQueryString();
        }else{
            $products = Product::paginate(12);
        }

        return view('products', [
            'title' => 'Eazy Play! - All Games',
            'products' => $products
        ]);
    }

    public function show(Product $product)
    {
        return view('product', [
            'title' => 'Eazy Play! - ' . $product->name,
            'product' => $product
        ]);
    }

    public function checkStock(Product $product, Platform $platform)
    {
        $stock = Stock::where([
            'product_id' => $product->id,
            'platform_id' => $platform->id
        ])->first('stock');

        return response()->json($stock);
    }
}
