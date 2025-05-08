@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Membership Details</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h6>Member</h6>
                <p>{{ $membership->member->name }}</p>
                
                <h6>Membership Type</h6>
                <p>{{ ucfirst($membership->membership_type) }}</p>
                
                <h6>Start Date</h6>
                <p>{{ $membership->start_date->format('M d, Y') }}</p>
            </div>
            <div class="col-md-6">
                <h6>End Date</h6>
                <p>{{ $membership->end_date->format('M d, Y') }}</p>
                
                <h6>Amount</h6>
                <p>${{ number_format($membership->amount, 2) }}</p>
                
                <h6>Status</h6>
                <p>
                    @if($membership->status)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Expired</span>
                    @endif
                </p>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <a href="{{ route('memberships.edit', $membership->id) }}" class="btn btn-warning me-2">Edit</a>
            <form action="{{ route('memberships.destroy', $membership->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h5>Payment History</h5>
    </div>
    <div class="card-body">
        @if($membership->payments->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Transaction ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($membership->payments as $payment)
                    <tr>
                        <td>{{ $payment->payment_date->format('M d, Y') }}</td>
                        <td>${{ number_format($payment->amount, 2) }}</td>
                        <td>{{ ucfirst($payment->payment_method) }}</td>
                        <td>{{ $payment->transaction_id ?? 'N/A' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No payment records found.</p>
        @endif
    </div>
</div>
@endsection