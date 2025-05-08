<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Member;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('member')->orderBy('check_in', 'desc')->get();
        return view('attendances.index', compact('attendances'));
    }

    public function create()
    {
        $members = Member::all();
        return view('attendances.create', compact('members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'check_in' => 'required|date',
        ]);

        Attendance::create($request->all());

        return redirect()->route('attendances.index')->with('success', 'Attendance recorded successfully.');
    }

    public function edit(Attendance $attendance)
    {
        $members = Member::all();
        return view('attendances.edit', compact('attendance', 'members'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'check_in' => 'required|date',
            'check_out' => 'nullable|date|after:check_in',
        ]);

        $attendance->update($request->all());

        return redirect()->route('attendances.index')->with('success', 'Attendance updated successfully.');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendances.index')->with('success', 'Attendance deleted successfully.');
    }
}