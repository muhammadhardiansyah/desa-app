<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index',[
            'active' => 'dash_posts',
            'posts'   => Post::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'active' => 'add_posts',
            'categories' => Category::latest()->get(),
            'authors' => User::latest()->get()
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
        // return $request->file('image')->store('post-images');
        $validatedData = $request->validate([
            'title'         => 'required|min:3|max:255',
            'slug'          => 'required|unique:posts',
            'image'         => 'image|file|max:2048',
            'user_id'       => 'required',
            'category_id'   => 'required',
            'body'          => 'required',
        ]);

        if ($request -> file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('success', 'New Post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return view('dashboard.posts.show', [
            'active' => 'dash_posts',
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('dashboard.posts.edit',[
            'active' => 'dash_posts',
            'post'  => $post,
            'categories' => Category::latest()->get(),
            'authors' => User::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $rules = [
            'title'         => 'required|min:3|max:255',
            'user_id'       => 'required',
            'category_id'   => 'required',
            'image'         => 'image|file|max:2048',
            'body'          => 'required',
        ];

        if ($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';
        }
        else{
            $rules['slug'] = 'required';
        }

        $validatedData= $request->validate($rules);

        if ($request -> file('image')) {
            if($post->image){
                Storage::delete($post->image);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::where('id', $post->id)->update($validatedData);

        return redirect('/dashboard/posts')->with('warning', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }
        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('danger', 'Post has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}

