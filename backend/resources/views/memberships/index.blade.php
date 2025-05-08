@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Memberships</h5>
        <a href="{{ route('memberships.create') }}" class="btn btn-primary">Add Membership</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Member</th>
                    <th>Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($memberships as $membership)
                <tr>
                    <td>{{ $membership->id }}</td>
                    <td>{{ $membership->member->name }}</td>
                    <td>{{ $membership->membership_type }}</td>
                    <td>{{ $membership->start_date->format('Y-m-d') }}</td>
                    <td>{{ $membership->end_date->format('Y-m-d') }}</td>
                    <td>${{ number_format($membership->amount, 2) }}</td>
                    <td>
                        @if($membership->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Expired</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('memberships.show', $membership->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('memberships.edit', $membership->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('memberships.destroy', $membership->id) }}" method="POST" class="d-inline">
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