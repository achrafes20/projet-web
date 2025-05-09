@extends('layouts.app')

@section('title', 'Add Equipment')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Add New Equipment</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('equipment.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Equipment
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('equipment.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="serial_number" class="form-label">Serial Number</label>
                            <input type="text" class="form-control" id="serial_number" name="serial_number" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="purchase_date" class="form-label">Purchase Date</label>
                            <input type="date" class="form-control" id="purchase_date" name="purchase_date" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="condition" class="form-label">Condition</label>
                            <select class="form-select" id="condition" name="condition" required>
                                <option value="good">Good</option>
                                <option value="needs_maintenance">Needs Maintenance</option>
                                <option value="needs_replacement">Needs Replacement</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="last_maintenance" class="form-label">Last Maintenance</label>
                            <input type="date" class="form-control" id="last_maintenance" name="last_maintenance">
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control" id="notes" name="notes" rows="2"></textarea>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Add Equipment</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection