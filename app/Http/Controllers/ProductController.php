<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Products::latest();
        return view('product.products',[
            "title" => 'Product',
            "active"=> 'product',
            "products"=> $products->paginate(7)->withQueryString(),
            "excerpt" => Str::limit(strip_tags($products->first()->description), 200)
        ]);
    }

    public function show(Products $product)
    {
        return view('product.product', [
            "title" => $product->name,
            "active" => 'product',
            "product"  => $product
        ]);
    }
}
