@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Member</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $member->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $member->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $member->phone }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="join_date" class="form-label">Join Date</label>
                        <input type="date" class="form-control" id="join_date" name="join_date" value="{{ $member->join_date }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="birth_date" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $member->birth_date }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="male" {{ $member->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $member->gender == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ $member->gender == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="emergency_contact" class="form-label">Emergency Contact</label>
                        <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" value="{{ $member->emergency_contact }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                        @if($member->photo)
                            <img src="{{ asset('storage/' . $member->photo) }}" width="50" height="50" class="mt-2">
                        @endif
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required>{{ $member->address }}</textarea>
            </div>
            <div class="mb-3 form-check">
    <input type="checkbox" 
           class="form-check-input" 
           id="status" 
           name="status" 
           value="1" 
           @checked(old('status', $membership->status ?? false))>
    <label class="form-check-label" for="status">Active</label>
</div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection