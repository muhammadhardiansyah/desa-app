<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
// use App\Http\Controllers\SigninController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardProductsController;
use App\Http\Controllers\DashboardStaffController;
use App\Http\Controllers\DashboardUsersController;
use App\Http\Controllers\DashboardPositionController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\DashboardTransparencyController;
use App\Http\Controllers\DashboardGalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TransparencyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/signin', [SigninController::class, 'index'])->middleware('guest'); 
// Route::post('/signin', [SigninController::class, 'store']); 

//DASHBOARD


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/category/checkSlug', [DashboardPostCategoryController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/category', DashboardPostCategoryController::class)->except('show')->middleware('admin');

Route::get('/dashboard/users/checkSlug', [DashboardUsersController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/users', DashboardUsersController::class)->except('show')->middleware('admin');

Route::get('/dashboard/product/checkSlug', [DashboardProductsController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/products', DashboardProductsController::class)->middleware('auth');

Route::resource('/dashboard/position', DashboardPositionController::class)->middleware('admin');

Route::get('/dashboard/staff/checkSlug', [DashboardStaffController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/staff', DashboardStaffController::class)->middleware('admin');

Route::get('/dashboard/profile/checkSlug', [DashboardProfileController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/profile', DashboardProfileController::class)->middleware('admin');

Route::resource('/dashboard/transparency', DashboardTransparencyController::class)->middleware('admin');

Route::get('/dashboard/gallery/checkSlug', [DashboardGalleryController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/gallery', DashboardGalleryController::class)->middleware('admin');

// Route::get('category/{category:slug}', [PostController::class, 'showByCategory']);

// Route::get('authors/{author:username}', [PostController::class, 'showByAuthor']);

// LANDING PAGE

Route::get('/', [HomeController::class, 'index']);

Route::get('/posts', [PostController::class, 'index'] );

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', [PostController::class, 'showCategories']); 

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); 
Route::post('/login', [LoginController::class, 'authenticate']); 
Route::post('/logout', [LoginController::class, 'logout']); 

Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{product:slug}', [ProductController::class, 'show']);

Route::get('/profil', [ProfileController::class, 'index']);

Route::get('/perangkat_desa', [StaffController::class, 'index']);

Route::get('/transparansi', [TransparencyController::class, 'index']);

Route::get('/contact', function () {
    return view('contact', [
        "title" => 'Contact',
        "active"=> 'contact'
    ]);
});

