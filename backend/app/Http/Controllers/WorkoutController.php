<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use App\Models\Member;
use App\Models\Trainer;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function index()
    {
        $workouts = Workout::with(['member', 'trainer'])->get();
        return view('workouts.index', compact('workouts'));
    }

    public function create()
    {
        $members = Member::all();
        $trainers = Trainer::all();
        return view('workouts.create', compact('members', 'trainers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'trainer_id' => 'required|exists:trainers,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        Workout::create($request->all());

        return redirect()->route('workouts.index')->with('success', 'Workout scheduled successfully.');
    }

    public function show(Workout $workout)
    {
        return view('workouts.show', compact('workout'));
    }

    public function edit(Workout $workout)
    {
        $members = Member::all();
        $trainers = Trainer::all();
        return view('workouts.edit', compact('workout', 'members', 'trainers'));
    }

    public function update(Request $request, Workout $workout)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'trainer_id' => 'required|exists:trainers,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        $workout->update($request->all());

        return redirect()->route('workouts.index')->with('success', 'Workout updated successfully.');
    }

    public function destroy(Workout $workout)
    {
        $workout->delete();
        return redirect()->route('workouts.index')->with('success', 'Workout deleted successfully.');
    }
}