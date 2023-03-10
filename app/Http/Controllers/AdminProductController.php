<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/product/index', [
            'title' => 'Admin - Products',
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
        return view('admin/product/create', [
            'title' => 'Create product',
            'categories' => Category::all(),
            'platform' => Platform::all(),
            'discount' => Discount::all()
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
        // Validation for product table
        $validatedDataProduct = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'platform_id' => 'required',
            'discount_id' => 'nullable',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image'
        ], [
            'category_id' => 'Category field is required',
            'platform_id' => 'Platform field is required'
        ]);

        if($request->file('image'))
        {
            $validatedDataProduct['image'] = $request->file('image')->store('product-image');
        }

        if($request->discount_id !== NULL)
        {
            $discount = Discount::where('id', $request->discount_id)->first('discount');
            $discount_price = $request->price * $discount->discount / 100;

            $price = $request->price - $discount_price;

            $validatedDataProduct['price'] = $price;
        }

        $validatedDataProduct['slug'] = SlugService::createSlug(Product::class, 'slug', $request->name);
        
        $product = Product::create($validatedDataProduct);
        
        // Insert for product category
        $category_id = $request->category_id;

        $product->category()->attach($category_id);

        // Insert for product platform
        $platform_id = $request->platform_id;

        $product->platform()->attach($platform_id);
        
        return redirect('/dashboard/products')->with('success', 'New product has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin/product/show', [
            'title' => "Detail Product - $product->name",
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin/product/edit', [
            'title' => 'Edit Product',
            'product' => $product,
            'categories' => Category::all(),
            'platform' => Platform::all(),
            'discount' => Discount::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // Validation for product table
        $rules = [
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'discount_id' => 'nullable',
            'image' => 'image'
        ];

        if($request->slug != $product->slug)
        {
            $rules['slug'] = 'required|unique:products';
        }

        // Validation for category product
        $request->validate([
            'category_id' => 'required'
        ]);
        
        // Validation for category product
        $request->validate([
            'platform_id' => 'required'
        ]);

        $validatedDataProduct = $request->validate($rules);

        if($request->file('image'))
        {
            if($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }
            
            $validatedDataProduct['image'] = $request->file('image')->store('product-image');
        }

        if($request->discount_id !== NULL)
        {
            $discount = Discount::where('id', $request->discount_id)->first('discount');

            if($request->discount_id == $product->discount_id && $request->price == $product->price)
            {
                $validatedDataProduct['price'] = $request->price;
                
            }else{

                $discount_price = $request->price * $discount->discount / 100;
    
                $price = $request->price - $discount_price;
    
                $validatedDataProduct['price'] = $price;
            }
        }
        
        Product::where('id', $product->id)->update($validatedDataProduct);

        // Category Id from request
        $category_id = $request->category_id;
        
        // Update for category product table
        $product->category()->sync($category_id);

        // Category Id from request
        $platform_id = $request->platform_id;
        
        // Update for category product table
        $product->platform()->sync($platform_id);
        
        return redirect('/dashboard/products')->with('success', 'Product has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image)
        {
            Storage::delete($product->image);
        }

        // Delete category product
        $product->category()->detach();

        Product::destroy($product->id);

        return redirect('/dashboard/products')->with('success', 'Product has been deleted!');
    }

    // For update product
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Product::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }

    // Get platform product
    public function getPlatform(Product $product)
    {
        $platform = $product->platform;
        return response()->json(['platform' => $platform]);
    }
}
