@extends('layouts.app')

@section('title', 'Trainer Details')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Trainer Details: {{ $trainer->name }}</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('trainers.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Trainers
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    @if($trainer->profile_image)
                        <img src="{{ asset('storage/' . $trainer->profile_image) }}" alt="{{ $trainer->name }}" class="rounded-circle mb-3" width="150" height="150">
                    @else
                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 150px; height: 150px; margin: 0 auto;">
                            <i class="bi bi-person" style="font-size: 3rem;"></i>
                        </div>
                    @endif
                    <h3>{{ $trainer->name }}</h3>
                    <p class="text-muted">{{ $trainer->specialization }}</p>
                    
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <a href="{{ route('trainers.edit', $trainer->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('trainers.destroy', $trainer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this trainer?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Contact Information</h5>
                </div>
                <div class="card-body">
                    <p><strong>Email:</strong> {{ $trainer->email }}</p>
                    <p><strong>Phone:</strong> {{ $trainer->phone }}</p>
                    <p><strong>Hire Date:</strong> {{ \Carbon\Carbon::parse($trainer->hire_date)->format('M d, Y') }}</p>
                    <p><strong>Years with Gym:</strong> {{ \Carbon\Carbon::parse($trainer->hire_date)->diffInYears(now()) }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Professional Details</h5>
                </div>
                <div class="card-body">
                    <p><strong>Specialization:</strong> {{ $trainer->specialization }}</p>
                    
                    @if($trainer->bio)
                        <p><strong>Bio:</strong></p>
                        <p>{{ $trainer->bio }}</p>
                    @endif
                    
                    @if($trainer->certifications)
                        <p><strong>Certifications:</strong></p>
                        <p>{{ $trainer->certifications }}</p>
                    @endif
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h5>Upcoming Workouts ({{ $trainer->workouts->where('date', '>=', now()->format('Y-m-d'))->count() }})</h5>
                </div>
                <div class="card-body">
                    @if($trainer->workouts->where('date', '>=', now()->format('Y-m-d'))->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Member</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($trainer->workouts->where('date', '>=', now()->format('Y-m-d'))->sortBy('date') as $workout)
                                    <tr>
                                        <td>{{ $workout->date->format('M d, Y') }}</td>
                                        <td>{{ $workout->start_time }} - {{ $workout->end_time }}</td>
                                        <td>
                                            <a href="{{ route('members.show', $workout->member_id) }}">{{ $workout->member->name }}</a>
                                        </td>
                                        <td>
                                            @if($workout->status == 'completed')
                                                <span class="badge bg-success">Completed</span>
                                            @elseif($workout->status == 'cancelled')
                                                <span class="badge bg-danger">Cancelled</span>
                                            @else
                                                <span class="badge bg-primary">Scheduled</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>No upcoming workouts scheduled.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection