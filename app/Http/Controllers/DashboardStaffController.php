<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\User;
use App\Models\Position;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.staff.index',[
            'active' => 'dash_staff',
            'staff' => Staff::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.staff.create',[
            'active'    => 'add_staff',
            'users'     => User::latest()->get(),
            'positions' => Position::all()
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
            'user_id'       => 'required',
            'position_id'   => 'required',
        ]);

        Staff::create($validatedData);

        return redirect('/dashboard/staff')->with('success', 'New Staff has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        return view('dashboard.staff.edit',[
            'active'    => 'dash_staff',
            'staff'     => $staff,
            'users'     => User::latest()->get(),
            'positions' => Position::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        $rules = [
            'user_id'       => 'required',
            'position_id'   => 'required'    
        ];

        $validatedData= $request->validate($rules);

        Staff::where('id', $staff->id)->update($validatedData);

        return redirect('/dashboard/staff')->with('warning', 'Staff has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        Staff::destroy($staff->id);
        
        return redirect('/dashboard/staff')->with('danger', 'Staff has been deleted!');
    }
}
