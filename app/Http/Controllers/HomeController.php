<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Post;
use App\Models\Products;

class HomeController extends Controller
{
    public function index()
    {
        // dd(Staff::all());
        return view('beranda.home', [
            "title" => 'Home',
            "active" => 'home',
            'staff' => Staff::all(),
            'posts' => Post::latest()->take(3)->get(),
            'products'=> Products::latest()->take(4)->get()
        ]);
    }
}
