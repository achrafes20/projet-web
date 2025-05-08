<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::with('member')->get();
        return view('memberships.index', compact('memberships'));
    }

    public function create()
    {
        $members = Member::all();
        return view('memberships.create', compact('members'));
    }

    public function store(Request $request)
{
    $request->validate([
        'member_id' => 'required|exists:members,id',
        'membership_type' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'amount' => 'required|numeric',
    ]);

    Membership::create([
        'member_id' => $request->member_id,
        'membership_type' => $request->membership_type,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'amount' => $request->amount,
        'status' => $request->has('status') // This will convert checkbox to boolean
    ]);

    return redirect()->route('memberships.index')->with('success', 'Membership added successfully.');
}
    public function show(Membership $membership)
    {
        return view('memberships.show', compact('membership'));
    }

    public function edit(Membership $membership)
    {
        $members = Member::all();
        return view('memberships.edit', compact('membership', 'members'));
    }

    public function update(Request $request, Membership $membership)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'membership_type' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'amount' => 'required|numeric',
        ]);

        $membership->update($request->all());

        return redirect()->route('memberships.index')->with('success', 'Membership updated successfully.');
    }

    public function destroy(Membership $membership)
    {
        $membership->delete();
        return redirect()->route('memberships.index')->with('success', 'Membership deleted successfully.');
    }
}