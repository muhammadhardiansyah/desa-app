<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Staff;
use App\Models\Authorizations;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.users.index', [
            'active'=> 'dash_users',
            'users' => User::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create',[
            'active' => 'add_users',
            'authorizations' => Authorizations::all()
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
            'name'              => 'required|min:3|max:255',
            'username'          => 'required|min:3|max:255|unique:users',
            'email'             => 'required|email:dns|unique:users',
            'password'          => 'required|min:5|max:255',
            'image'             => 'image|file|max:2048',
            'authorizations_id' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']); 

        if ($request -> file('image')) {
            $validatedData['image'] = $request->file('image')->store('users-images');
        }

        User::create($validatedData);

        return redirect('/dashboard/users')->with('success', 'New User has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit',[
            'active' => 'dash_users',
            'user' => $user,
            'authorizations' => Authorizations::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name'              => 'required|min:3|max:255',
            'image'             => 'image|file|max:2048',
            'authorizations_id' => 'required',
        ];

        if ($request->username != $user->username){
            $rules['username'] = 'required|min:3|max:255|unique:users';
        }
        else{
            $rules['username'] = 'required|min:3|max:255';
        }

        if ($request->email != $user->email){
            $rules['email'] = 'required|email:dns|unique:users';
        }
        else{
            $rules['email'] = 'required|email:dns';
        }

        $validatedData= $request->validate($rules);

        if ($request -> file('image')) {
            if($user->image){
                Storage::delete($user->image);
            }
            $validatedData['image'] = $request->file('image')->store('user-images',);
        }

        User::where('id', $user->id)->update($validatedData);

        return redirect('/dashboard/users')->with('warning', 'User has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->image){
            Storage::delete($user->image);
        }
        User::destroy($user->id);
        // Delete post
        $posts = Post::where('user_id', $user->id);
        $posts->delete();
        // Delete staff
        $staff = Staff::where('user_id', $user->id);
        $staff->delete();

        return redirect('/dashboard/users')->with('danger', 'User has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
