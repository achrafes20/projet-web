@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Payment Record</h5>
    </div>
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
                                <option value="{{ $member->id }}" {{ $payment->member_id == $member->id ? 'selected' : '' }}>{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="membership_id" class="form-label">Membership</label>
                        <select class="form-select" id="membership_id" name="membership_id" required>
                            @foreach($memberships as $membership)
                                <option value="{{ $membership->id }}" {{ $payment->membership_id == $membership->id ? 'selected' : '' }}>
                                    {{ $membership->membership_type }} ({{ $membership->member->name }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="{{ $payment->amount }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="payment_date" class="form-label">Payment Date</label>
                        <input type="date" class="form-control" id="payment_date" name="payment_date" value="{{ $payment->payment_date }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Payment Method</label>
                        <select class="form-select" id="payment_method" name="payment_method" required>
                            <option value="cash" {{ $payment->payment_method == 'cash' ? 'selected' : '' }}>Cash</option>
                            <option value="credit_card" {{ $payment->payment_method == 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                            <option value="debit_card" {{ $payment->payment_method == 'debit_card' ? 'selected' : '' }}>Debit Card</option>
                            <option value="bank_transfer" {{ $payment->payment_method == 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                            <option value="online" {{ $payment->payment_method == 'online' ? 'selected' : '' }}>Online Payment</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="transaction_id" class="form-label">Transaction ID (if any)</label>
                        <input type="text" class="form-control" id="transaction_id" name="transaction_id" value="{{ $payment->transaction_id }}">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="notes" class="form-label">Notes</label>
                <textarea class="form-control" id="notes" name="notes" rows="3">{{ $payment->notes }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('payments.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection