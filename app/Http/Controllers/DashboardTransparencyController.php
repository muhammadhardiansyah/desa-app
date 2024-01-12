<?php

namespace App\Http\Controllers;

use App\Models\Transparency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardTransparencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.transparencies.index', [
            'active'            => 'dash_transparency',
            'transparencies'    => Transparency::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.transparencies.create', [
            'active'        => 'add_transparency'
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
            'tahun'          => 'required',
            'PAD'            => 'required',
            'DD'             => 'required',
            'BHP'            => 'required',
            'ADD'            => 'required',
            't_pendapatan'   => 'required',
            'pemerintahan'   => 'required',
            'pembangunan'   => 'required',
            'pembinaan'     => 'required',
            'pemberdayaan'  => 'required',
            'darurat'       => 'required',
            't_belanja'     => 'required',
            'surdef'        => 'required',
            'p_pembiayaan'  => 'required',
            'image'         => 'image|file|max:2048'
        ]);

        if ($request -> file('image')) {
            $validatedData['image'] = $request->file('image')->store('transparency-images');
        }

        Transparency::create($validatedData);

        return redirect('/dashboard/transparency')->with('success', 'New Transparency has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transparency  $transparency
     * @return \Illuminate\Http\Response
     */
    public function show(Transparency $transparency)
    {
        return view('dashboard.transparencies.show', [
            'active'    => 'dash_transparency',
            'transparency'=> $transparency
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transparency  $transparency
     * @return \Illuminate\Http\Response
     */
    public function edit(Transparency $transparency)
    {
        return view('dashboard.transparencies.edit', [
            'active' => 'dash_transparency',
            'transparency' => $transparency
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transparency  $transparency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transparency $transparency)
    {
        $rules = [
            'tahun'          => 'required',
            'PAD'            => 'required',
            'DD'             => 'required',
            'BHP'            => 'required',
            'ADD'            => 'required',
            't_pendapatan'   => 'required',
            'pemerintahan'   => 'required',
            'pembangunan'   => 'required',
            'pembinaan'     => 'required',
            'pemberdayaan'  => 'required',
            'darurat'       => 'required',
            't_belanja'     => 'required',
            'surdef'        => 'required',
            'p_pembiayaan'  => 'required',
            'image'         => 'image|file|max:2048'
        ];

        $validatedData= $request->validate($rules);

        if ($request -> file('image')) {
            if($transparency->image){
                Storage::delete($transparency->image);
            }
            $validatedData['image'] = $request->file('image')->store('transparency-images');
        }

        Transparency::where('id', $transparency->id)->update($validatedData);

        return redirect('/dashboard/transparency')->with('warning', 'Transparency has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transparency  $transparency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transparency $transparency)
    {
        if($transparency->image){
            Storage::delete($transparency->image);
        }
        Transparency::destroy($transparency->id);

        return redirect('/dashboard/transparency')->with('danger', 'Transparency has been deleted!');
    }
}
