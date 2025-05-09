@extends('layouts.app')

@section('title', 'Memberships')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Membership Plans</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('memberships.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Add Membership
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
                            <th>Price</th>
                            <th>Duration</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($memberships as $membership)
                        <tr>
                            <td>{{ $membership->id }}</td>
                            <td>{{ $membership->name }}</td>
                            <td>${{ number_format($membership->price, 2) }}</td>
                            <td>{{ $membership->duration_days }} days</td>
                            <td>{{ Str::limit($membership->description, 50) }}</td>
                            <td>
                                <a href="{{ route('memberships.show', $membership->id) }}" class="btn btn-sm btn-info" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('memberships.edit', $membership->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('memberships.destroy', $membership->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this membership plan?')">
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