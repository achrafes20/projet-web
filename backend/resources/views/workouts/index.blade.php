@extends('layouts.app')

@section('title', 'Workouts')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Workout Sessions</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('workouts.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Schedule Workout
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Member</th>
                            <th>Trainer</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($workouts as $workout)
                        <tr>
                            <td>{{ $workout->id }}</td>
                            <td>{{ \Carbon\Carbon::parse($workout->date)->format('M d, Y') }}</td>
                            <td>{{ $workout->start_time }} - {{ $workout->end_time }}</td>
                            <td>{{ $workout->member->name }}</td>
                            <td>{{ $workout->trainer->name }}</td>
                            <td>
                                @if($workout->status == 'completed')
                                    <span class="badge bg-success">Completed</span>
                                @elseif($workout->status == 'cancelled')
                                    <span class="badge bg-danger">Cancelled</span>
                                @else
                                    <span class="badge bg-primary">Scheduled</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('workouts.show', $workout->id) }}" class="btn btn-sm btn-info" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('workouts.edit', $workout->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('workouts.destroy', $workout->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this workout session?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection