@extends('layouts.app')

@section('title', 'Member Details')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Member Details: {{ $member->name }}</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('members.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Members
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    @if($member->profile_image)
                        <img src="{{ asset('storage/' . $member->profile_image) }}" alt="{{ $member->name }}" class="rounded-circle mb-3" width="150" height="150">
                    @else
                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 150px; height: 150px; margin: 0 auto;">
                            <i class="bi bi-person" style="font-size: 3rem;"></i>
                        </div>
                    @endif
                    <h3>{{ $member->name }}</h3>
                    <p class="text-muted">{{ $member->email }}</p>
                    
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this member?')">
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
                    <h5>Membership Info</h5>
                </div>
                <div class="card-body">
                    <p><strong>Membership:</strong> {{ $member->membership->name }}</p>
                    <p><strong>Price:</strong> ${{ $member->membership->price }}</p>
                    <p><strong>Duration:</strong> {{ $member->membership->duration_days }} days</p>
                    <p><strong>Join Date:</strong> {{ $member->join_date ? \Carbon\Carbon::parse($member->join_date)->format('M d, Y') : 'N/A' }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Personal Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Email:</strong> {{ $member->email }}</p>
                            <p><strong>Phone:</strong> {{ $member->phone }}</p>
                            <p><strong>Birth Date:</strong> {{ $member->birth_date ? \Carbon\Carbon::parse($member->birth_date)->format('M d, Y') : 'N/A' }}</p>
                            <p><strong>Age:</strong> {{ $member->birth_date ? \Carbon\Carbon::parse($member->birth_date)->age.' years' : 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Gender:</strong> {{ $member->gender ? ucfirst($member->gender) : 'N/A' }}</p>
                            <p><strong>Emergency Contact:</strong> {{ $member->emergency_contact ?? 'N/A' }}</p>
                            <p><strong>Health Notes:</strong> {{ $member->health_notes ?? 'None' }}</p>
                        </div>
                    </div>
                    <p><strong>Address:</strong> {{ $member->address ?? 'N/A' }}</p>
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Payment History</h5>
                </div>
                <div class="card-body">
                    @if($member->payments->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Due Date</th>
                                        <th>Method</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($member->payments as $payment)
                                    <tr>
                                        <td>{{ $payment->payment_date ? \Carbon\Carbon::parse($payment->payment_date)->format('M d, Y') : 'N/A' }}</td>
                                        <td>${{ number_format($payment->amount, 2) }}</td>
                                        <td>{{ $payment->due_date ? \Carbon\Carbon::parse($payment->due_date)->format('M d, Y') : 'N/A' }}</td>
                                        <td>{{ $payment->payment_method ? ucfirst($payment->payment_method) : 'N/A' }}</td>
                                        <td>
                                            @if($payment->status == 'paid')
                                                <span class="badge bg-success">Paid</span>
                                            @else
                                                <span class="badge bg-danger">Pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>No payment history found.</p>
                    @endif
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h5>Workout Schedule</h5>
                </div>
                <div class="card-body">
                    @if($member->workouts->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Trainer</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($member->workouts as $workout)
                                    <tr>
                                        <td>{{ $workout->date ? \Carbon\Carbon::parse($workout->date)->format('M d, Y') : 'N/A' }}</td>
                                        <td>{{ $workout->start_time ?? 'N/A' }} - {{ $workout->end_time ?? 'N/A' }}</td>
                                        <td>{{ $workout->trainer->name ?? 'N/A' }}</td>
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
                        <p>No workout sessions scheduled.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection