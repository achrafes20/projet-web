@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Workout Plan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('workout-plans.update', $workoutPlan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="member_id" class="form-label">Member</label>
                        <select class="form-select" id="member_id" name="member_id" required>
                            @foreach($members as $member)
                                <option value="{{ $member->id }}" {{ $workoutPlan->member_id == $member->id ? 'selected' : '' }}>{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $workoutPlan->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $workoutPlan->start_date }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $workoutPlan->end_date }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="goal" class="form-label">Goal</label>
                        <select class="form-select" id="goal" name="goal" required>
                            <option value="weight_loss" {{ $workoutPlan->goal == 'weight_loss' ? 'selected' : '' }}>Weight Loss</option>
                            <option value="muscle_gain" {{ $workoutPlan->goal == 'muscle_gain' ? 'selected' : '' }}>Muscle Gain</option>
                            <option value="strength" {{ $workoutPlan->goal == 'strength' ? 'selected' : '' }}>Strength</option>
                            <option value="endurance" {{ $workoutPlan->goal == 'endurance' ? 'selected' : '' }}>Endurance</option>
                            <option value="general_fitness" {{ $workoutPlan->goal == 'general_fitness' ? 'selected' : '' }}>General Fitness</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $workoutPlan->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="exercises" class="form-label">Exercises</label>
                <textarea class="form-control" id="exercises" name="exercises" rows="5" required>{{ $workoutPlan->exercises }}</textarea>
                <small class="text-muted">Enter each exercise on a new line with sets and reps (e.g., "Bench Press - 3 sets of 10 reps")</small>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('workout-plans.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection