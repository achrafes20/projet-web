@extends('layouts.app')

@section('title', 'Payments')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1>Payments</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('payments.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Record Payment
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Member</th>
                            <th>Membership</th>
                            <th>Amount</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                           <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('M d, Y') }}</td>
                            <td>{{ $payment->member->name }}</td>
                            <td>{{ $payment->membership->name }}</td>
                            <td>${{ number_format($payment->amount, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($payment->due_date)->format('M d, Y') }}</td>
                            <td>
                                @if($payment->status == 'paid')
                                    <span class="badge bg-success">Paid</span>
                                @else
                                    <span class="badge bg-danger">Pending</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-sm btn-info" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this payment record?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection