@extends('layouts.app')

@section('title', 'Payment Details')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Payment Details</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('payments.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Payments
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Payment Information</h5>
                </div>
                <div class="card-body">
                    <p><strong>Payment Date:</strong> {{ \Carbon\Carbon::parse($payment->payment_date)->format('M d, Y') }}</p>
                    <p><strong>Amount:</strong> ${{ number_format($payment->amount, 2) }}</p>
                   <p><strong>Due Date:</strong> {{ \Carbon\Carbon::parse($payment->due_date)->format('M d, Y') }}</p>
                    <p><strong>Payment Method:</strong> {{ ucfirst(str_replace('_', ' ', $payment->payment_method)) }}</p>
                    <p><strong>Status:</strong> 
                        @if($payment->status == 'paid')
                            <span class="badge bg-success">Paid</span>
                        @else
                            <span class="badge bg-danger">Pending</span>
                        @endif
                    </p>
                    
                    @if($payment->notes)
                        <p><strong>Notes:</strong></p>
                        <p>{{ $payment->notes }}</p>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Member Information</h5>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> <a href="{{ route('members.show', $payment->member_id) }}">{{ $payment->member->name }}</a></p>
                    <p><strong>Email:</strong> {{ $payment->member->email }}</p>
                    <p><strong>Phone:</strong> {{ $payment->member->phone }}</p>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h5>Membership Information</h5>
                </div>
                <div class="card-body">
                    <p><strong>Plan:</strong> {{ $payment->membership->name }}</p>
                    <p><strong>Description:</strong> {{ $payment->membership->description }}</p>
                    <p><strong>Duration:</strong> {{ $payment->membership->duration_days }} days</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="d-flex justify-content-end gap-2 mt-3">
        <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this payment record?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-trash"></i> Delete
            </button>
        </form>
    </div>
</div>
@endsection