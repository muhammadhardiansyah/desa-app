<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use App\Models\Post;
use App\Models\Products;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index', [
            'active' => 'dash',
            'users' => User::latest()->get(),
            'staff' => Staff::latest()->get(),
            'posts' => Post::latest()->get()
        ]);
    }
}
