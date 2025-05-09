@extends('layouts.app')

@section('title', 'Edit Trainer')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Edit Trainer: {{ $trainer->name }}</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('trainers.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Trainers
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('trainers.update', $trainer->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $trainer->name }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $trainer->email }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ $trainer->phone }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="specialization" class="form-label">Specialization</label>
                            <input type="text" class="form-control" id="specialization" name="specialization" value="{{ $trainer->specialization }}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="hire_date" class="form-label">Hire Date</label>
                         <input type="date" class="form-control" id="hire_date" name="hire_date" 
       value="{{ $trainer->hire_date ? \Carbon\Carbon::parse($trainer->hire_date)->format('Y-m-d') : '' }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea class="form-control" id="bio" name="bio" rows="3">{{ $trainer->bio }}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="certifications" class="form-label">Certifications</label>
                            <textarea class="form-control" id="certifications" name="certifications" rows="2">{{ $trainer->certifications }}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="profile_image" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="profile_image" name="profile_image">
                            @if($trainer->profile_image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $trainer->profile_image) }}" alt="{{ $trainer->name }}" width="100">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Update Trainer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection