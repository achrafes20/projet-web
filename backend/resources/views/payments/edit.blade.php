@extends('layouts.app')

@section('title', 'Edit Payment')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Edit Payment Record</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('payments.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Payments
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('payments.update', $payment->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="member_id" class="form-label">Member</label>
                            <select class="form-select" id="member_id" name="member_id" required>
                                @foreach($members as $member)
                                    <option value="{{ $member->id }}" {{ $payment->member_id == $member->id ? 'selected' : '' }}>
                                        {{ $member->name }} ({{ $member->membership->name }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="membership_id" class="form-label">Membership</label>
                            <select class="form-select" id="membership_id" name="membership_id" required>
                                @foreach($memberships as $membership)
                                    <option value="{{ $membership->id }}" {{ $payment->membership_id == $membership->id ? 'selected' : '' }}>
                                        {{ $membership->name }} (${{ $membership->price }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="{{ $payment->amount }}" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="payment_date" class="form-label">Payment Date</label>
                            <input type="date" class="form-control" id="payment_date" name="payment_date" 
       value="{{ $payment->payment_date ? \Carbon\Carbon::parse($payment->payment_date)->format('Y-m-d') : '' }}" 
       required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="due_date" class="form-label">Due Date</label>
                          <input type="date" class="form-control" id="due_date" name="due_date" 
       value="{{ $payment->due_date ? \Carbon\Carbon::parse($payment->due_date)->format('Y-m-d') : '' }}" 
       required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="payment_method" class="form-label">Payment Method</label>
                            <select class="form-select" id="payment_method" name="payment_method" required>
                                <option value="cash" {{ $payment->payment_method == 'cash' ? 'selected' : '' }}>Cash</option>
                                <option value="credit_card" {{ $payment->payment_method == 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                                <option value="debit_card" {{ $payment->payment_method == 'debit_card' ? 'selected' : '' }}>Debit Card</option>
                                <option value="bank_transfer" {{ $payment->payment_method == 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                                <option value="check" {{ $payment->payment_method == 'check' ? 'selected' : '' }}>Check</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control" id="notes" name="notes" rows="2">{{ $payment->notes }}</textarea>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Update Payment</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection