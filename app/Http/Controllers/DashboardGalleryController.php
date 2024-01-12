<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.gallery.index', [
            'active' => 'dash_gallery',
            'galleries'=> Gallery::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.gallery.create', [
            'active' => 'add_gallery'
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
            'title'          => 'required|min:3|max:255',
            'slug'          => 'required|unique:galleries',
            'image'         => 'required|image|file|max:2048'
        ]);

        if ($request -> file('image')) {
            $validatedData['image'] = $request->file('image')->store('gallery-images');
        }

        Gallery::create($validatedData);

        return redirect('/dashboard/gallery')->with('success', 'New image has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('dashboard.gallery.edit', [
            'active' => 'dash_gallery',
            'gallery'=> $gallery
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $rules = [
            'title'         => 'required|min:3|max:255',
            'image'         => 'image|file|max:2048'
        ];

        if ($request->slug != $gallery->slug){
            $rules['slug'] = 'required|unique:galleries';
        }
        else{
            $rules['slug'] = 'required';
        }

        $validatedData= $request->validate($rules);

        if ($request -> file('image')) {
            if($gallery->image){
                Storage::delete($gallery->image);
            }
            $validatedData['image'] = $request->file('image')->store('gallery-images');
        }

        Gallery::where('id', $gallery->id)->update($validatedData);

        return redirect('/dashboard/gallery')->with('warning', 'Image has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if($gallery->image){
            Storage::delete($gallery->image);
        }
        Gallery::destroy($gallery->id);

        return redirect('/dashboard/gallery')->with('danger', 'Product has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Gallery::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
