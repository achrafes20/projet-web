@extends('layouts.app')

@section('title', 'Edit Workout')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Edit Workout Session</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('workouts.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Workouts
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('workouts.update', $workout->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="member_id" class="form-label">Member</label>
                            <select class="form-select" id="member_id" name="member_id" required>
                                @foreach($members as $member)
                                    <option value="{{ $member->id }}" {{ $workout->member_id == $member->id ? 'selected' : '' }}>{{ $member->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="trainer_id" class="form-label">Trainer</label>
                            <select class="form-select" id="trainer_id" name="trainer_id" required>
                                @foreach($trainers as $trainer)
                                    <option value="{{ $trainer->id }}" {{ $workout->trainer_id == $trainer->id ? 'selected' : '' }}>{{ $trainer->name }} ({{ $trainer->specialization }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                           <input type="date" class="form-control" id="date" name="date" 
       value="{{ $workout->date ? \Carbon\Carbon::parse($workout->date)->format('Y-m-d') : '' }}" 
       required>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="start_time" class="form-label">Start Time</label>
                                    <input type="time" class="form-control" id="start_time" name="start_time" value="{{ $workout->start_time }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="end_time" class="form-label">End Time</label>
                                    <input type="time" class="form-control" id="end_time" name="end_time" value="{{ $workout->end_time }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="scheduled" {{ $workout->status == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                        <option value="completed" {{ $workout->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $workout->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control" id="notes" name="notes" rows="3">{{ $workout->notes }}</textarea>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Update Workout</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection