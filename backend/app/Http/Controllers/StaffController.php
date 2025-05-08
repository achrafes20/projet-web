<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::all();
        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:staff',
        'phone' => 'required',
        'position' => 'required',
        'join_date' => 'required|date',
        'address' => 'required',
        'salary' => 'required|numeric',
    ]);

    $staff = new Staff($request->all());
    
    // Convert checkbox value to boolean
    $staff->status = $request->has('status');
    
    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('staff_photos', 'public');
        $staff->photo = $path;
    }
    
    $staff->save();

    return redirect()->route('staff.index')->with('success', 'Staff member added successfully.');
}

    public function show(Staff $staff)
    {
        return view('staff.show', compact('staff'));
    }

    public function edit(Staff $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:staff,email,'.$staff->id,
        'phone' => 'required',
        'position' => 'required',
        'join_date' => 'required|date',
        'address' => 'required',
        'salary' => 'required|numeric',
    ]);

    $staff->fill($request->all());
    
    // Convert checkbox value to boolean
    $staff->status = $request->has('status');
    
    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('staff_photos', 'public');
        $staff->photo = $path;
    }
    
    $staff->save();

    return redirect()->route('staff.index')->with('success', 'Staff member updated successfully.');
}

    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->route('staff.index')->with('success', 'Staff member deleted successfully.');
    }
}