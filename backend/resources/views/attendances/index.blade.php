@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Attendance Records</h5>
        <a href="{{ route('attendances.create') }}" class="btn btn-primary">Add Attendance</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Member</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->id }}</td>
                    <td>{{ $attendance->member->name }}</td>
                    <td>{{ $attendance->check_in->format('Y-m-d h:i A') }}</td>
                    <td>
                        @if($attendance->check_out)
                            {{ $attendance->check_out->format('Y-m-d h:i A') }}
                        @else
                            <span class="text-muted">Not checked out</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" class="d-inline">
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