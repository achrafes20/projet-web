@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Staff Member Details</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                @if($staff->photo)
                    <img src="{{ asset('storage/' . $staff->photo) }}" class="img-fluid rounded-circle mb-3" style="width: 200px; height: 200px; object-fit: cover;">
                @else
                    <img src="https://via.placeholder.com/200" class="img-fluid rounded-circle mb-3">
                @endif
                <h4>{{ $staff->name }}</h4>
                <p class="text-muted">{{ $staff->position }}</p>
                <span class="badge {{ $staff->status ? 'bg-success' : 'bg-danger' }}">
                    {{ $staff->status ? 'Active' : 'Inactive' }}
                </span>
            </div>
            <div class="col-md-8">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6>Email</h6>
                        <p>{{ $staff->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Phone</h6>
                        <p>{{ $staff->phone }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6>Join Date</h6>
                        <p>{{ $staff->join_date->format('M d, Y') }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Salary</h6>
                        <p>${{ number_format($staff->salary, 2) }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <h6>Address</h6>
                        <p>{{ $staff->address }}</p>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-warning me-2">Edit</a>
                    <form action="{{ route('staff.destroy', $staff->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection