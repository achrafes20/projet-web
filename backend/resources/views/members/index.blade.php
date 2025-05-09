@extends('layouts.app')

@section('title', 'Members')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Members</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('members.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Add Member
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Membership</th>
                            <th>Join Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $member)
                        <tr>
                            <td>{{ $member->id }}</td>
                            <td>
                                @if($member->profile_image)
                                    <img src="{{ asset('storage/' . $member->profile_image) }}" alt="{{ $member->name }}" class="rounded-circle me-2" width="30" height="30">
                                @endif
                                {{ $member->name }}
                            </td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>{{ $member->membership->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($member->join_date)->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('members.show', $member->id) }}" class="btn btn-sm btn-info" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this member?')">
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