<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.profiles.index', [
            'active'    => 'dash_profile',
            'profiles'  => Profile::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.profiles.create',[
            'active' => 'add_profile'
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
            'slug'          => 'required|unique:profiles',
            'image'         => 'image|file|max:2048',
            'description'   => 'required'
        ]);

        if ($request -> file('image')) {
            $validatedData['image'] = $request->file('image')->store('profile-images');
        }

        Profile::create($validatedData);

        return redirect('/dashboard/profile')->with('success', 'New Profile has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return view('dashboard.profiles.show', [
            'active' => 'dash_profile',
            'profile'=> $profile
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('dashboard.profiles.edit', [
            'active' => 'dash_profile',
            'profile'=> $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $rules = [
            'title'         => 'required|min:3|max:255',
            'image'         => 'image|file|max:2048',
            'description'   => 'required'
        ];

        if ($request->slug != $profile->slug){
            $rules['slug'] = 'required|unique:profiles';
        }
        else{
            $rules['slug'] = 'required';
        }

        $validatedData= $request->validate($rules);

        if ($request -> file('image')) {
            if($profile->image){
                Storage::delete($profile->image);
            }
            $validatedData['image'] = $request->file('image')->store('profile-images');
        }

        Profile::where('id', $profile->id)->update($validatedData);

        return redirect('/dashboard/profile')->with('warning', 'Profile has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        if($profile->image){
            Storage::delete($profile->image);
        }
        Profile::destroy($profile->id);

        return redirect('/dashboard/profile')->with('danger', 'Profile has been deleted!');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Profile::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
