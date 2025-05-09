<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::all();
        return view('trainers.index', compact('trainers'));
    }

    public function create()
    {
        return view('trainers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:trainers',
            'phone' => 'required',
            'specialization' => 'required',
            'hire_date' => 'required|date',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('trainer_images', 'public');
            $data['profile_image'] = $imagePath;
        }

        Trainer::create($data);

        return redirect()->route('trainers.index')->with('success', 'Trainer created successfully.');
    }

    public function show(Trainer $trainer)
    {
        return view('trainers.show', compact('trainer'));
    }

    public function edit(Trainer $trainer)
    {
        return view('trainers.edit', compact('trainer'));
    }

    public function update(Request $request, Trainer $trainer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:trainers,email,' . $trainer->id,
            'phone' => 'required',
            'specialization' => 'required',
            'hire_date' => 'required|date',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('trainer_images', 'public');
            $data['profile_image'] = $imagePath;
        }

        $trainer->update($data);

        return redirect()->route('trainers.index')->with('success', 'Trainer updated successfully.');
    }

    public function destroy(Trainer $trainer)
    {
        $trainer->delete();
        return redirect()->route('trainers.index')->with('success', 'Trainer deleted successfully.');
    }
}