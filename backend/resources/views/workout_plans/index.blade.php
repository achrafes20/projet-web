@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Workout Plans</h5>
        <a href="{{ route('workout-plans.create') }}" class="btn btn-primary">Add Workout Plan</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Member</th>
                    <th>Title</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Goal</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($workoutPlans as $workoutPlan)
                <tr>
                    <td>{{ $workoutPlan->id }}</td>
                    <td>{{ $workoutPlan->member->name }}</td>
                    <td>{{ $workoutPlan->title }}</td>
                    <td>{{ $workoutPlan->start_date->format('Y-m-d') }}</td>
                    <td>{{ $workoutPlan->end_date->format('Y-m-d') }}</td>
                    <td>{{ $workoutPlan->goal }}</td>
                    <td>
                        <a href="{{ route('workout-plans.edit', $workoutPlan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('workout-plans.destroy', $workoutPlan->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection