@extends('layouts.app')

@section('title', 'Edit Member')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Edit Member: {{ $member->name }}</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('members.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Members
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $member->name) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $member->email) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone', $member->phone) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="join_date" class="form-label">Join Date</label>
                            <input type="date" class="form-control" id="join_date" name="join_date" 
                                   value="{{ old('join_date', $member->join_date ? \Carbon\Carbon::parse($member->join_date)->format('Y-m-d') : '') }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="birth_date" class="form-label">Birth Date</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" 
                                   value="{{ old('birth_date', $member->birth_date ? \Carbon\Carbon::parse($member->birth_date)->format('Y-m-d') : '') }}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="male" {{ old('gender', $member->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender', $member->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('gender', $member->gender) == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="2" required>{{ old('address', $member->address) }}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="emergency_contact" class="form-label">Emergency Contact</label>
                            <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" 
                                   value="{{ old('emergency_contact', $member->emergency_contact) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="health_notes" class="form-label">Health Notes</label>
                            <textarea class="form-control" id="health_notes" name="health_notes" rows="2">{{ old('health_notes', $member->health_notes) }}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="profile_image" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="profile_image" name="profile_image">
                            @if($member->profile_image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $member->profile_image) }}" alt="{{ $member->name }}" width="100">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="remove_profile_image" name="remove_profile_image">
                                        <label class="form-check-label" for="remove_profile_image">
                                            Remove current image
                                        </label>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                        <div class="mb-3">
                            <label for="membership_id" class="form-label">Membership</label>
                            <select class="form-select" id="membership_id" name="membership_id" required>
                                @foreach($memberships as $membership)
                                    <option value="{{ $membership->id }}" {{ old('membership_id', $member->membership_id) == $membership->id ? 'selected' : '' }}>
                                        {{ $membership->name }} (${{ number_format($membership->price, 2) }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Update Member</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection