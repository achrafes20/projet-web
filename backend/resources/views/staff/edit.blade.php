@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Staff Member</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $staff->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $staff->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $staff->phone }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" class="form-control" id="position" name="position" value="{{ $staff->position }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="join_date" class="form-label">Join Date</label>
                        <input type="date" class="form-control" id="join_date" name="join_date" value="{{ $staff->join_date }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                        @if($staff->photo)
                            <img src="{{ asset('storage/' . $staff->photo) }}" width="50" height="50" class="mt-2">
                        @endif
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required>{{ $staff->address }}</textarea>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" step="0.01" class="form-control" id="salary" name="salary" value="{{ $staff->salary }}" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="status" name="status" {{ $staff->status ? 'checked' : '' }}>
                <label class="form-check-label" for="status">Active</label>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('staff.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection