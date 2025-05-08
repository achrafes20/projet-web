@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Members</h5>
        <a href="{{ route('members.create') }}" class="btn btn-primary">Add Member</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>
                        @if($member->photo)
                            <img src="{{ asset('storage/' . $member->photo) }}" width="50" height="50" class="rounded-circle">
                        @else
                            <img src="https://via.placeholder.com/50" width="50" height="50" class="rounded-circle">
                        @endif
                    </td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>
                        @if($member->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('members.show', $member->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('members.edit', $member->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="d-inline">
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