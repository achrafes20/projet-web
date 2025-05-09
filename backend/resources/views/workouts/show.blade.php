@extends('layouts.app')

@section('title', 'Workout Details')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Workout Session Details</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('workouts.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Workouts
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Session Information</h5>
                </div>
                <div class="card-body">
                  <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($workout->date)->format('l, F j, Y') }}</p>
                    <p><strong>Time:</strong> {{ $workout->start_time }} - {{ $workout->end_time }}</p>
                    <p><strong>Status:</strong> 
                        @if($workout->status == 'completed')
                            <span class="badge bg-success">Completed</span>
                        @elseif($workout->status == 'cancelled')
                            <span class="badge bg-danger">Cancelled</span>
                        @else
                            <span class="badge bg-primary">Scheduled</span>
                        @endif
                    </p>
                    
                    @if($workout->notes)
                        <p><strong>Notes:</strong></p>
                        <p>{{ $workout->notes }}</p>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Member Information</h5>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> <a href="{{ route('members.show', $workout->member_id) }}">{{ $workout->member->name }}</a></p>
                    <p><strong>Membership:</strong> {{ $workout->member->membership->name }}</p>
                    <p><strong>Phone:</strong> {{ $workout->member->phone }}</p>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h5>Trainer Information</h5>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> <a href="{{ route('trainers.show', $workout->trainer_id) }}">{{ $workout->trainer->name }}</a></p>
                    <p><strong>Specialization:</strong> {{ $workout->trainer->specialization }}</p>
                    <p><strong>Phone:</strong> {{ $workout->trainer->phone }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="d-flex justify-content-end gap-2 mt-3">
        <a href="{{ route('workouts.edit', $workout->id) }}" class="btn btn-warning">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <form action="{{ route('workouts.destroy', $workout->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this workout session?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-trash"></i> Delete
            </button>
        </form>
    </div>
</div>
@endsection