<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\WorkoutPlan;
use Illuminate\Http\Request;

class WorkoutPlanController extends Controller
{
    public function index()
    {
        $workoutPlans = WorkoutPlan::with('member')->get();
        return view('workout_plans.index', compact('workoutPlans'));
    }

    public function create()
    {
        $members = Member::all();
        return view('workout_plans.create', compact('members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'goal' => 'required',
            'exercises' => 'required',
        ]);

        WorkoutPlan::create($request->all());

        return redirect()->route('workout-plans.index')->with('success', 'Workout plan created successfully.');
    }

    public function show(WorkoutPlan $workoutPlan)
    {
        return view('workout_plans.show', compact('workoutPlan'));
    }

    public function edit(WorkoutPlan $workoutPlan)
    {
        $members = Member::all();
        return view('workout_plans.edit', compact('workoutPlan', 'members'));
    }

    public function update(Request $request, WorkoutPlan $workoutPlan)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'goal' => 'required',
            'exercises' => 'required',
        ]);

        $workoutPlan->update($request->all());

        return redirect()->route('workout-plans.index')->with('success', 'Workout plan updated successfully.');
    }

    public function destroy(WorkoutPlan $workoutPlan)
    {
        $workoutPlan->delete();
        return redirect()->route('workout-plans.index')->with('success', 'Workout plan deleted successfully.');
    }
}