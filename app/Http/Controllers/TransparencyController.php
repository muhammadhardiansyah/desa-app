<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transparency;

class TransparencyController extends Controller
{
    public function index()
    {
        return view('transparansi.transparansi', [
            "title" => 'Transparansi',
            "active" => 'transparansi',
            'transparency' => Transparency::latest()->first()
        ]);
    }
}
