@extends('layouts.app')

@section('title', 'Add Trainer')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Add New Trainer</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('trainers.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Trainers
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('trainers.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="specialization" class="form-label">Specialization</label>
                            <input type="text" class="form-control" id="specialization" name="specialization" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="hire_date" class="form-label">Hire Date</label>
                            <input type="date" class="form-control" id="hire_date" name="hire_date" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea class="form-control" id="bio" name="bio" rows="3"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="certifications" class="form-label">Certifications</label>
                            <textarea class="form-control" id="certifications" name="certifications" rows="2"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="profile_image" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="profile_image" name="profile_image">
                        </div>
                    </div>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Save Trainer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection