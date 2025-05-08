@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Member Details</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                @if($member->photo)
                    <img src="{{ asset('storage/' . $member->photo) }}" class="img-fluid rounded-circle mb-3" style="width: 200px; height: 200px; object-fit: cover;">
                @else
                    <img src="https://via.placeholder.com/200" class="img-fluid rounded-circle mb-3">
                @endif
                <h4>{{ $member->name }}</h4>
                <p class="text-muted">Member since {{ $member->join_date ? \Carbon\Carbon::parse($member->join_date)->format('M d, Y') : 'N/A' }}</p>
                <span class="badge {{ $member->status ? 'bg-success' : 'bg-danger' }}">
                    {{ $member->status ? 'Active' : 'Inactive' }}
                </span>
            </div>
            <div class="col-md-8">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6>Email</h6>
                        <p>{{ $member->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Phone</h6>
                        <p>{{ $member->phone }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6>Birth Date</h6>
                        <p>{{ $member->birth_date ? \Carbon\Carbon::parse($member->birth_date)->format('M d, Y') : 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Gender</h6>
                        <p>{{ ucfirst($member->gender) }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <h6>Address</h6>
                        <p>{{ $member->address }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <h6>Emergency Contact</h6>
                        <p>{{ $member->emergency_contact }}</p>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning me-2">Edit</a>
                    <form action="{{ route('members.destroy', $member->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h5>Membership Information</h5>
    </div>
    <div class="card-body">
        @if($member->memberships->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($member->memberships as $membership)
                    <tr>
                        <td>{{ $membership->membership_type }}</td>
                        <td>{{ $membership->start_date ? \Carbon\Carbon::parse($membership->start_date)->format('M d, Y') : 'N/A' }}</td>
                        <td>{{ $membership->end_date ? \Carbon\Carbon::parse($membership->end_date)->format('M d, Y') : 'N/A' }}</td>
                        <td>${{ number_format($membership->amount, 2) }}</td>
                        <td>
                            @if($membership->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Expired</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No membership records found.</p>
        @endif
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h5>Attendance History</h5>
    </div>
    <div class="card-body">
        @if($member->attendances->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($member->attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->check_in ? \Carbon\Carbon::parse($attendance->check_in)->format('M d, Y') : 'N/A' }}</td>
                        <td>{{ $attendance->check_in ? \Carbon\Carbon::parse($attendance->check_in)->format('h:i A') : 'N/A' }}</td>
                        <td>
                            @if($attendance->check_out)
                                {{ \Carbon\Carbon::parse($attendance->check_out)->format('h:i A') }}
                            @else
                                <span class="text-muted">Not checked out</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No attendance records found.</p>
        @endif
    </div>
</div>
@endsection