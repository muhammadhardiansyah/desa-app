<?php

namespace App\Http\Controllers;

use App\Models\Products;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.product.index',[
            'active' => 'dash_products',
            'products'=> Products::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.product.create',[
            'active' => 'add_products'
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
            'name'          => 'required|min:3|max:255',
            'slug'          => 'required|unique:products',
            'by'            => 'required|min:3|max:255',
            'image'         => 'image|file|max:2048',
            'description'   => 'required'
        ]);

        if ($request -> file('image')) {
            $validatedData['image'] = $request->file('image')->store('products-images');
        }

        Products::create($validatedData);

        return redirect('/dashboard/products')->with('success', 'New Product has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {
        return view('dashboard.product.show', [
            'active' => 'dash_products',
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        return view('dashboard.product.edit',[
            'active' => 'dash_products',
            'product'=> $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        $rules = [
            'name'         => 'required|min:3|max:255',
            'image'         => 'image|file|max:2048',
            'by'            => 'required|min:3|max:255',
            'description'   => 'required'
        ];

        if ($request->slug != $product->slug){
            $rules['slug'] = 'required|unique:products';
        }
        else{
            $rules['slug'] = 'required';
        }

        $validatedData= $request->validate($rules);

        if ($request -> file('image')) {
            if($product->image){
                Storage::delete($product->image);
            }
            $validatedData['image'] = $request->file('image')->store('products-images');
        }

        Products::where('id', $product->id)->update($validatedData);

        return redirect('/dashboard/products')->with('warning', 'Product has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        if($product->image){
            Storage::delete($product->image);
        }
        Products::destroy($product->id);

        return redirect('/dashboard/products')->with('danger', 'Product has been deleted!');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
