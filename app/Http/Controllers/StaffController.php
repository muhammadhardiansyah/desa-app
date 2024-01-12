<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    public function index()
    {
        return view('perangkat.perangkat_desa', [
            "title" => 'Perangkat Desa',
            "active"=> 'perangkat',
            'staff' => Staff::all()
        ]);
    }
}
