<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members',
            'phone' => 'required',
            'join_date' => 'required|date',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'address' => 'required',
            'emergency_contact' => 'required',
        ]);

        $member = new Member($request->all());
        
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('member_photos', 'public');
            $member->photo = $path;
        }
        
        $member->save();

        return redirect()->route('members.index')->with('success', 'Member added successfully.');
    }

    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members,email,'.$member->id,
            'phone' => 'required',
            'join_date' => 'required|date',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'address' => 'required',
            'emergency_contact' => 'required',
        ]);

        $member->fill($request->all());
        
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('member_photos', 'public');
            $member->photo = $path;
        }
        
        $member->save();

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }
}