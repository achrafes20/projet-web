@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Staff Members</h5>
        <a href="{{ route('staff.create') }}" class="btn btn-primary">Add Staff</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staff as $staffMember)
                <tr>
                    <td>{{ $staffMember->id }}</td>
                    <td>
                        @if($staffMember->photo)
                            <img src="{{ asset('storage/' . $staffMember->photo) }}" width="50" height="50" class="rounded-circle">
                        @else
                            <img src="https://via.placeholder.com/50" width="50" height="50" class="rounded-circle">
                        @endif
                    </td>
                    <td>{{ $staffMember->name }}</td>
                    <td>{{ $staffMember->position }}</td>
                    <td>{{ $staffMember->email }}</td>
                    <td>
                        @if($staffMember->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('staff.show', $staffMember->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('staff.edit', $staffMember->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('staff.destroy', $staffMember->id) }}" method="POST" class="d-inline">
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