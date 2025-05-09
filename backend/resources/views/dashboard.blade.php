@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Dashboard</h1>
    
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Members</h5>
                    <h2 class="card-text">{{ $totalMembers }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Revenue</h5>
                    <h2 class="card-text">${{ number_format($totalPayments, 2) }}</h2>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Upcoming Workouts</h5>
                </div>
                <div class="card-body">
                    @if($upcomingWorkouts->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Member</th>
                                        <th>Trainer</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($upcomingWorkouts as $workout)
                                    <tr>
                                        <td>{{ $workout->member->name }}</td>
                                        <td>{{ $workout->trainer->name }}</td>
                                        <td>{{ $workout->date->format('M d, Y') }}</td>
                                        <td>{{ $workout->start_time }} - {{ $workout->end_time }}</td>
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
        
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Equipment Maintenance</h5>
                </div>
                <div class="card-body">
                    @if($equipment->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Condition</th>
                                        <th>Last Maintenance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($equipment as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @if($item->condition == 'good')
                                                <span class="badge bg-success">Good</span>
                                            @elseif($item->condition == 'needs_maintenance')
                                                <span class="badge bg-warning">Needs Maintenance</span>
                                            @else
                                                <span class="badge bg-danger">Needs Replacement</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->last_maintenance ? $item->last_maintenance->format('M d, Y') : 'Never' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>All equipment is in good condition.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection