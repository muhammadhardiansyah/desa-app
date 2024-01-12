<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Gallery;

class ProfileController extends Controller
{
    public function index() {
        return view('profile.profil', [
            "title" => 'Profil',
            'active'=>'profil',
            'profiles'=> Profile::all(),
            'galleries'=> Gallery::all()
        ]);
    }
}
