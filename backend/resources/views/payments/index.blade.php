@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Payment Records</h5>
        <a href="{{ route('payments.create') }}" class="btn btn-primary">Add Payment</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Member</th>
                    <th>Membership</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Method</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->member->name }}</td>
                    <td>{{ $payment->membership->membership_type }}</td>
                    <td>${{ number_format($payment->amount, 2) }}</td>
                    <td>{{ $payment->payment_date->format('Y-m-d') }}</td>
                    <td>{{ ucfirst($payment->payment_method) }}</td>
                    <td>
                        <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection