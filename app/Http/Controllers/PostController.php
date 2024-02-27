<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \App\Models\Post;
use \App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = 'in ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = 'by ' . $author->name;
        }
        return view('posts', [
            "title" => 'All Post ' . $title,
            "active" => 'all_post',
            "posts" => Post::latest()->filter(request(['search_post', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => 'single post',
            "active" => 'post',
            "post"  => $post
        ]);
    }

    public function showCategories()
    {
        return view('categories', [
            'title' => 'Posts Categories',
            "active" => 'categories',
            'categories' => Category::all()
        ]);
    }

    
    // public function showByCategory(Category $category)
    // {
    //     return view('posts', [
    //         'title' => 'Post by category: ' . $category->name,
    //         'active'=> 'category',
    //         'posts' => $category->posts->load('category', 'author')
    //     ]);
    // }
    // public function showByAuthor(User $author)
    // {
    //     return view('posts', [
    //         'title' => 'Post by author: ' . $author->name,
    //         'active'=> 'author',
    //         'posts' => $author->posts->load('category', 'author'),
    //     ]);
    // }
}
