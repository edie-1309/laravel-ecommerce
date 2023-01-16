<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

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
            'title' => 'Products',
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
            'categories' => Category::all()
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
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image'
        ]);

        if($request->file('image'))
        {
            $validatedDataProduct['image'] = $request->file('image')->store('product-image');
        }

        $validatedDataProduct['slug'] = SlugService::createSlug(Product::class, 'slug', $request->name);
        
        $product = Product::create($validatedDataProduct);
        
        // Insert for product_category
        $category_id = $request->category_id;

        $product->category()->attach($category_id);
        
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
            'categories' => Category::all()
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

        $validatedDataProduct = $request->validate($rules);

        if($request->file('image'))
        {
            if($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }
            
            $validatedDataProduct['image'] = $request->file('image')->store('product-image');
        }
        
        Product::where('id', $product->id)->update($validatedDataProduct);

        // Category Id from request
        $category_id = $request->category_id;
        
        // Update for category product table
        $product->category()->sync($category_id);
        
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
}
