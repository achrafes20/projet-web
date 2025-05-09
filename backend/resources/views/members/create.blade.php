@extends('layouts.app')

@section('title', 'Add Member')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Add New Member</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('members.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Members
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="join_date" class="form-label">Join Date</label>
                            <input type="date" class="form-control" id="join_date" name="join_date" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="birth_date" class="form-label">Birth Date</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="2" required></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="emergency_contact" class="form-label">Emergency Contact</label>
                            <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="health_notes" class="form-label">Health Notes</label>
                            <textarea class="form-control" id="health_notes" name="health_notes" rows="2"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="profile_image" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="profile_image" name="profile_image">
                        </div>
                        
                        <div class="mb-3">
                            <label for="membership_id" class="form-label">Membership</label>
                            <select class="form-select" id="membership_id" name="membership_id" required>
                                <option value="">Select Membership</option>
                                @foreach($memberships as $membership)
                                    <option value="{{ $membership->id }}">{{ $membership->name }} (${{ $membership->price }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Save Member</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection