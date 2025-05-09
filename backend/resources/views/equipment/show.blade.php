@extends('layouts.app')

@section('title', 'Equipment Details')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Equipment Details: {{ $equipment->name }}</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('equipment.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Equipment
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Basic Information</h5>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $equipment->name }}</p>
                    <p><strong>Serial Number:</strong> {{ $equipment->serial_number }}</p>
                <p><strong>Purchase Date:</strong> {{ \Carbon\Carbon::parse($equipment->purchase_date)->format('M d, Y') }}</p>
                   <p><strong>Age:</strong> {{ \Carbon\Carbon::parse($equipment->purchase_date)->diffInYears(now()) }} years</p>
                    <p><strong>Price:</strong> ${{ number_format($equipment->price, 2) }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Maintenance Information</h5>
                </div>
                <div class="card-body">
                    <p><strong>Condition:</strong> 
                        @if($equipment->condition == 'good')
                            <span class="badge bg-success">Good</span>
                        @elseif($equipment->condition == 'needs_maintenance')
                            <span class="badge bg-warning">Needs Maintenance</span>
                        @else
                            <span class="badge bg-danger">Needs Replacement</span>
                        @endif
                    </p>
                    <p><strong>Last Maintenance:</strong> 
                       {{ $equipment->last_maintenance ? \Carbon\Carbon::parse($equipment->last_maintenance)->format('M d, Y') : 'Never' }}
                    <p><strong>Days Since Last Maintenance:</strong> 
                        @if($equipment->last_maintenance)
                           {{ $equipment->last_maintenance ? \Carbon\Carbon::parse($equipment->last_maintenance)->diffInDays(now()) : 'N/A' }} days
                        @else
                            N/A
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <h5>Notes</h5>
        </div>
        <div class="card-body">
            @if($equipment->notes)
                <p>{{ $equipment->notes }}</p>
            @else
                <p class="text-muted">No notes available.</p>
            @endif
        </div>
    </div>
    
    <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('equipment.edit', $equipment->id) }}" class="btn btn-warning">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <form action="{{ route('equipment.destroy', $equipment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this equipment?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-trash"></i> Delete
            </button>
        </form>
    </div>
</div>
@endsection