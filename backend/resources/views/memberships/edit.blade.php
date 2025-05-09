@extends('layouts.app')

@section('title', 'Edit Membership')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Edit Membership: {{ $membership->name }}</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('memberships.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Memberships
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('memberships.update', $membership->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $membership->name }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $membership->description }}</textarea>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $membership->price }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="duration_days" class="form-label">Duration (days)</label>
                            <input type="number" class="form-control" id="duration_days" name="duration_days" value="{{ $membership->duration_days }}" required>
                        </div>
                    </div>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Update Membership</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection