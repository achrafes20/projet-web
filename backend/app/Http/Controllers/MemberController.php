<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Membership;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::with('membership')->get();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        $memberships = Membership::all();
        return view('members.create', compact('memberships'));
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
            'membership_id' => 'required|exists:memberships,id',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('member_images', 'public');
            $data['profile_image'] = $imagePath;
        }

        Member::create($data);

        return redirect()->route('members.index')->with('success', 'Member created successfully.');
    }

    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    public function edit(Member $member)
    {
        $memberships = Membership::all();
        return view('members.edit', compact('member', 'memberships'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members,email,' . $member->id,
            'phone' => 'required',
            'join_date' => 'required|date',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'address' => 'required',
            'emergency_contact' => 'required',
            'membership_id' => 'required|exists:memberships,id',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('member_images', 'public');
            $data['profile_image'] = $imagePath;
        }

        $member->update($data);

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }
}