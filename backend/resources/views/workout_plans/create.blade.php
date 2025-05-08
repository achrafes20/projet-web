@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Add Workout Plan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('workout-plans.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="member_id" class="form-label">Member</label>
                        <select class="form-select" id="member_id" name="member_id" required>
                            <option value="">Select Member</option>
                            @foreach($members as $member)
                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="goal" class="form-label">Goal</label>
                        <select class="form-select" id="goal" name="goal" required>
                            <option value="weight_loss">Weight Loss</option>
                            <option value="muscle_gain">Muscle Gain</option>
                            <option value="strength">Strength</option>
                            <option value="endurance">Endurance</option>
                            <option value="general_fitness">General Fitness</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exercises" class="form-label">Exercises</label>
                <textarea class="form-control" id="exercises" name="exercises" rows="5" required></textarea>
                <small class="text-muted">Enter each exercise on a new line with sets and reps (e.g., "Bench Press - 3 sets of 10 reps")</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('workout-plans.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection