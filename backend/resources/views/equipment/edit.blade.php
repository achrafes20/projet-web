@extends('layouts.app')

@section('title', 'Edit Equipment')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Edit Equipment: {{ $equipment->name }}</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('equipment.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Equipment
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('equipment.update', $equipment->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $equipment->name }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="serial_number" class="form-label">Serial Number</label>
                            <input type="text" class="form-control" id="serial_number" name="serial_number" value="{{ $equipment->serial_number }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="purchase_date" class="form-label">Purchase Date</label>
                          <input type="date" class="form-control" id="purchase_date" name="purchase_date" 
       value="{{ $equipment->purchase_date ? \Carbon\Carbon::parse($equipment->purchase_date)->format('Y-m-d') : '' }}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $equipment->price }}" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="condition" class="form-label">Condition</label>
                            <select class="form-select" id="condition" name="condition" required>
                                <option value="good" {{ $equipment->condition == 'good' ? 'selected' : '' }}>Good</option>
                                <option value="needs_maintenance" {{ $equipment->condition == 'needs_maintenance' ? 'selected' : '' }}>Needs Maintenance</option>
                                <option value="needs_replacement" {{ $equipment->condition == 'needs_replacement' ? 'selected' : '' }}>Needs Replacement</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="last_maintenance" class="form-label">Last Maintenance</label>
                         <input type="date" class="form-control" id="last_maintenance" name="last_maintenance" 
       value="{{ $equipment->last_maintenance ? \Carbon\Carbon::parse($equipment->last_maintenance)->format('Y-m-d') : '' }}">
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control" id="notes" name="notes" rows="2">{{ $equipment->notes }}</textarea>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Update Equipment</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection