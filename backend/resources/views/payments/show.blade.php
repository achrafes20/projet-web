@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Payment Details</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h6>Member</h6>
                <p>{{ $payment->member->name }}</p>
                
                <h6>Membership</h6>
                <p>{{ $payment->membership->membership_type }}</p>
                
                <h6>Amount</h6>
                <p>${{ number_format($payment->amount, 2) }}</p>
            </div>
            <div class="col-md-6">
                <h6>Payment Date</h6>
                <p>{{ $payment->payment_date->format('M d, Y') }}</p>
                
                <h6>Payment Method</h6>
                <p>{{ ucfirst($payment->payment_method) }}</p>
                
                @if($payment->transaction_id)
                    <h6>Transaction ID</h6>
                    <p>{{ $payment->transaction_id }}</p>
                @endif
            </div>
        </div>
        @if($payment->notes)
            <div class="row mt-3">
                <div class="col-12">
                    <h6>Notes</h6>
                    <p>{{ $payment->notes }}</p>
                </div>
            </div>
        @endif
        <div class="d-flex justify-content-end mt-3">
            <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning me-2">Edit</a>
            <form action="{{ route('payments.destroy', $payment->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection