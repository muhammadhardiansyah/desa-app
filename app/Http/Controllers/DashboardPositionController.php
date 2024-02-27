<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Staff;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.staff.position.index',[
            'active'        => 'dash_position',
            'positions'     => Position::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.staff.position.create', [
            'active' => 'add_position'
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
            'name'          => 'required|min:3|max:255',
            'slug'          => 'required|unique:positions',
            
        ]);

        Position::create($validatedData);

        return redirect('/dashboard/position')->with('success', 'New Position has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        return view('dashboard.staff.position.edit',[
            'active'    => 'dash_position',
            'position'  => $position
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        $rules = [
            'name'         => 'required|min:3|max:255',
        ];

        if ($request->slug != $position->slug){
            $rules['slug'] = 'required|unique:positions';
        }
        else{
            $rules['slug'] = 'required';
        }

        $validatedData= $request->validate($rules);

        Position::where('id', $position->id)->update($validatedData);

        return redirect('/dashboard/position')->with('warning', 'Position has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        Position::destroy($position->id);
        $staff = Staff::where('position_id', $position->id);
        $staff->delete();

        return redirect('/dashboard/position')->with('danger', 'Position has been deleted!');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Position::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
